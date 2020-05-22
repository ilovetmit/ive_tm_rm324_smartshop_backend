<?php

namespace App\Http\Controllers\Api\v1\Transaction;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\TransactionResource;
use App\Models\TransactionManagement\RemittanceTransaction;
use App\Models\TransactionManagement\Transaction;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;

class TransactionController extends ApiController
{
    public function getTransaction()
    {
        try {
            // $bank = BankAccount::where('user_id', Auth::guard('api')->user()->user_id)->first();
            $transaction = Transaction::where('user_id', 1)->get();
            return parent::sendResponse('data', $transaction, 'Transaction Data');
        } catch (\Exception $e) {
            return parent::sendError('Transaction.', 216);
        }
    }


    public function transfer(Request $request)
    {
        try {

            if (($request->get('from') == "Saving" || $request->get('from') == "Current") && $request->get('to_account') == "VitCoin") {
                return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
            }

            // $user = User::find(Auth::guard('api')->user()->user_id); todo unComment Auth
            $user = User::find(1);
            $user_bankAccount = $user->hasBankAccount;

            if ($request->get('amount') < 0) {
                return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
            }

            $toUser = User::where('email', $request->get('to'))->first();
            if ($toUser->email == $user->email) {
                $toUser = $user;
            }

            if ($toUser) {
                $toUser_bankAccount = $toUser->hasBankAccount;
                if ($request->get('from') == 'VitCoin') { //todo Vitcoin Transfer
                    // if ($request->get('amount') > $user->ive_coin) {
                    //     return parent::sendError('You do not have enough Vit Coin', 216);
                    // }
                    // $userBalance = $user->ive_coin = $user->ive_coin - $request->get('amount');
                    // $toUserBalance = $toUser->ive_coin = $toUser->ive_coin + $request->get('amount');
                    // $user->save();
                    // $toUser->save();
                } elseif ($request->get('from') == 'Saving') {
                    if ($request->get('amount') > $user_bankAccount->saving_account) {
                        return parent::sendError('You do not have enough Saving', 216);
                    }
                    $userBalance = $user_bankAccount->saving_account = $user_bankAccount->saving_account - $request->get('amount');
                    if ($request->get('to_account') == 'Saving') {
                        $toUserBalance = $toUser_bankAccount->saving_account = $toUser_bankAccount->saving_account + $request->get('amount');
                    } elseif ($request->get('to_account') == 'Current') {
                        $toUserBalance = $toUser_bankAccount->current_account = $toUser_bankAccount->current_account + $request->get('amount');
                    }
                    $toUser_bankAccount->save();
                    $user_bankAccount->save();
                } elseif ($request->get('from') == 'Current') {
                    if ($request->get('amount') > $user_bankAccount->current_account) {
                        return parent::sendError('You do not have enough Current', 216);
                    }

                    $userBalance = $user_bankAccount->current_account = $user_bankAccount->current_account - $request->get('amount');
                    if ($request->get('to_account') == 'Saving') {
                        $toUserBalance = $toUser_bankAccount->saving_account = $toUser_bankAccount->saving_account + $request->get('amount');
                    } elseif ($request->get('to_account') == 'Current') {
                        $toUserBalance = $toUser_bankAccount->current_account = $toUser_bankAccount->current_account + $request->get('amount');
                    }
                    $toUser_bankAccount->save();
                    $user_bankAccount->save();
                } else {
                    return parent::sendError('Payment Error', 216);
                }
            } else {
                return parent::sendError('No such User found', 216);
            }

            $transactions_user = new Transaction;
            $transactions_user->user_id = $user->id;
            $transactions_user->header = "Transfer to " . $request->to . " (" . $request->get('to_account') . ")";
            $transactions_user->amount = $request->get('amount');
            $transactions_user->balance = $userBalance;
            $currency = array_flip(config("constant.transaction_currency"));
            $transactions_user->currency = $currency[$request->get('from')];
            $transactions_user->save();

            $transactions_toUser = new Transaction;
            $transactions_toUser->user_id = $toUser->id;
            $transactions_toUser->header = "Transfer from " . $user->email . " (" . $request->get('from') . ")";
            $transactions_toUser->amount = $request->get('amount');
            $transactions_toUser->balance = $toUserBalance;
            $currency = array_flip(config("constant.transaction_currency"));
            $transactions_toUser->currency = $currency[$request->get('to_account')];
            $transactions_toUser->save();

            $remittance_transaction = new RemittanceTransaction;
            $remittance_transaction->transaction_id = $transactions_user->id;
            $remittance_transaction->payee_id = $toUser->id;
            $remittance_transaction->save();

            return parent::sendResponse('status', true, 'Transfer success');
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }
}
