<?php

namespace App\Http\Controllers\Api\v1\Locker;

use App\Http\Controllers\Api\v1\ApiController;
use App\Models\TransactionManagement\Transaction;
use App\Models\InformationManagement\BankAccount;
use Illuminate\Http\Request;
use App\Models\LockerManagement\Locker;
use App\Models\TransactionManagement\LockerTransaction;
use App\Models\UserManagement\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LockerController extends ApiController
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $lockers = Locker::where('is_active', '1')->get();
            return parent::sendResponse('data', $lockers, 'Locker Data');
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function locker_using()
    {
        try {
            $lockers = Locker::where('is_active', '1')->where('is_using', '2')->first();
            return parent::sendResponse('data', $lockers, 'Locker Data');
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }

    /**
     * @param Request $request
     * $request->item
     * $request->to
     * $request->amount
     * $request->account
     * $request->day
     * $request->remark
     * @return \Illuminate\Http\Response
     */
    public function create_order(Request $request)
    {
        try {
            $locker = Locker::where('is_active', '1')->where('is_using', '1')->first();
            if (is_null($request->item) || $request->item == "") {
                return parent::sendError('Item Data Error', 216);
            }
            if ($locker) {
                // $user = User::find(Auth::guard('api')->user()->user_id);
                $user = User::find(1);
                $user_account = $user->hasBankAccount;
                $toUser = User::where('email', $request->get('to'))->first();
                if ($toUser) {
                    if ($request->get('account') == 'VitCoin') {
                        // if ($request->get('amount') > $user_account->ive_coin) {
                        //     return parent::sendError('You do not have enough VitCoin', 216);
                        // }
                        // $userBalance = $user_account->ive_coin = $user_account->ive_coin - $request->get('amount');
                        // $user_account->save();
                    } elseif ($request->get('account') == 'Saving') {
                        if ($request->get('amount') > $user_account->saving_account) {
                            return parent::sendError('You do not have enough money', 216);
                        }
                        $userBalance = $user_account->saving_account = $user_account->saving_account - $request->get('amount');
                        $user_account->save();
                    } elseif ($request->get('account') == 'Current') {
                        if ($request->get('amount') > $user_account->current_account) {
                            return parent::sendError('You do not have enough money', 216);
                        }

                        $userBalance = $user_account->current_account = $user_account->current_account - $request->get('amount');
                        $user_account->save();
                    } else {
                        return parent::sendError('Payment Error', 216);
                    }
                } else {
                    return parent::sendError('No such User found', 216);
                }

                $locker->is_using = "2";
                $locker->save();

                $transactions = new Transaction;
                $transactions->user_id = $user->user_id;
                // $transactions->type = config('constants.TRANSACTIONS_TYPE.LOCKER');
                $transactions->header = "Locker #" . $locker->locker_id . " to " . $request->to . " (" . $request->get('time') . " day)";
                $transactions->amount = $request->get('amount');
                $currency = array_flip(config("constants.transaction_currency"));
                $transactions->currency = $currency[$request->get('account')];
                $transactions->balance = $userBalance;
                $transactions->save();

                $lockerTransaction = new LockerTransaction;
                $lockerTransaction->transactions_id = $transactions->id;
                $lockerTransaction->locker_id = $locker->locker_id;
                $lockerTransaction->recipient_user_id = $toUser->user_id;
                $lockerTransaction->item = $request->item;
                $lockerTransaction->deadline = Carbon::now()->addDays($request->day)->toDate();
                $lockerTransaction->remark = $request->remark;
                $lockerTransaction->save();

                return parent::sendResponse('locker', $lockerTransaction, '#' . $locker->locker_id . ' Locker open');
            } else {
                return parent::sendError('There are currently no available lockers.', 216);
            }
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function take_list()
    {
        try {
            $lockers = LockerTransaction::with('hasTransaction.hasUser')->where('deadline', '<>',  null)->where('recipient_user_id', 2)->get();
            return parent::sendResponse('data', $lockers, 'Locker Data');
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function take_open($id)
    {
        try {
            $lockerTransaction = LockerTransaction::find($id);
            $locker = $lockerTransaction->hasLocker;
            if ($lockerTransaction->deadline != null) {
                if ($locker->is_using == 2) {
                    $locker->is_using = 1;
                    $lockerTransaction->deadline = null;
                    $lockerTransaction->save();
                    $locker->save();
                    return parent::sendResponse('data', $lockerTransaction, 'Locker Data');
                }
                return parent::sendError('is_using != 2', 216);
            }
            return parent::sendError('deadline', 216);
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }

    // /**
    //  * @param Request $request
    //  * $request->locker_id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function take(Request $request)
    // {
    //     try {
    //         $user = User::find(Auth::guard('api')->user()->user_id);
    //         $check = LockerTransaction::where('locker_id', $request->locker_id)
    //             ->where('user_id', Auth::guard('api')->user()->user_id)
    //             ->where('status', "1")
    //             ->first();

    //         if ($check) {
    //             return parent::sendError('Please wait for Locker to open', 233);
    //         }

    //         $locker = new LockerTransaction;
    //         $locker->user_id = Auth::guard('api')->user()->user_id;
    //         $locker->locker_id = $request->locker_id;
    //         $locker->status = "1";
    //         $locker->save();

    //         return parent::sendResponse('status', true, 'Locker open');
    //     } catch (\Exception $e) {
    //         return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
    //     }
    // }

    // /**
    //  * @param $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function open($id)
    // {
    //     try {

    //         $transactions = new Transaction;
    //         $transactions->user_id = Auth::guard('api')->user()->user_id;
    //         $transactions->type = config('constants.TRANSACTIONS_TYPE.LOCKER');
    //         $transactions->title = "Locker #" . $id . " Test";
    //         $transactions->amount = 0;
    //         $transactions->account = "VitCoin";
    //         $transactions->remark = "For Test Locker";
    //         $transactions->balance = Auth::guard('api')->user()->ive_coin;
    //         $transactions->save();

    //         $locker = new LockerTransaction;
    //         $locker->user_id = Auth::guard('api')->user()->user_id;
    //         $locker->to_user_id = Auth::guard('api')->user()->user_id;
    //         $locker->item = "Test Locker";
    //         $locker->locker_id = $id;
    //         $locker->transactions_id = $transactions->id;
    //         $locker->type = config('constants.LOCKER_TYPE.DONE');
    //         $locker->status = "1";
    //         $locker->remark = "[Test] Locker #" + $id + " Open";
    //         $locker->save();
    //         return parent::sendResponse('status', true, 'Locker open');
    //     } catch (\Exception $e) {
    //         return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
    //     }
    // }

    // /**
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show_open_list()
    // {
    //     try {
    //         $checkList = LockerTransaction::where('status', "1")->orderBy('created_at')->get();
    //         return parent::sendResponse('data', $checkList, 'Locker open');
    //     } catch (\Exception $e) {
    //         return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
    //     }
    // }
}
