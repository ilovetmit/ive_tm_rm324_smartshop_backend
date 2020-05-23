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
    public function locker_free()
    {
        try {
            $lockers = Locker::where('is_active', '1')->where('is_using', '1')->first();
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
            $locker = Locker::where('id', $request->get('locker_id'))->first();
            $locker_check = Locker::where('is_active', 1)->where('is_using', 1)->first();
            if ($locker->id != $locker_check->id) {
                return parent::sendError($locker_check->id, 216);
            }
            if (is_null($request->item) || $request->item == "") {
                return parent::sendError('Item Data Error', 216);
            }
            if ($locker) {
                $user = User::find(Auth::guard('api')->user()->id);
                $price = $locker->per_hour_price * $request->get('time');
                if ($price != $price) {
                    return parent::sendError('price cal error', 216);
                }
                $user_account = $user->hasBankAccount;
                $toUser = User::where('email', $request->get('to'))->first();
                if ($toUser) {
                    if ($request->get('account') == 'VitCoin') { //todo VitCoin Locker Payment

                    } elseif ($request->get('account') == 'Saving') {
                        if ($price > $user_account->saving_account) {
                            return parent::sendError('You do not have enough money', 216);
                        }
                        $userBalance = $user_account->saving_account = $user_account->saving_account - $price;
                        $user_account->save();
                    } elseif ($request->get('account') == 'Current') {
                        if ($price > $user_account->current_account) {
                            return parent::sendError('You do not have enough money', 216);
                        }

                        $userBalance = $user_account->current_account = $user_account->current_account - $price;
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
                $transactions->user_id = $user->id;
                // $transactions->type = config('constants.TRANSACTIONS_TYPE.LOCKER');
                $transactions->header = "Locker #" . $locker->id . " to " . $request->to . " (" . $request->get('time') . " day)";
                $transactions->amount = $price;
                $currency = array_flip(config("constant.transaction_currency"));
                $transactions->currency = $currency[$request->get('account')];
                $transactions->balance = $userBalance;
                $transactions->save();

                $lockerTransaction = new LockerTransaction;
                $lockerTransaction->transaction_id = $transactions->id;
                $lockerTransaction->locker_id = $locker->id;
                $lockerTransaction->recipient_user_id = $toUser->id;
                $lockerTransaction->item = $request->item;
                $lockerTransaction->deadline = Carbon::now()->addDays($request->get('time'))->toDate();
                $lockerTransaction->remark = $request->remark;
                $lockerTransaction->save();

                return parent::sendResponse('locker', $lockerTransaction, '#' . $locker->id . ' Locker open');
            } else {
                return parent::sendError('There are currently no available lockers.', 216);
            }
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function take_list()
    {
        try {
            $lockers = LockerTransaction::with('hasTransaction.hasUser')->where('deadline', '<>',  null)->where('recipient_user_id', Auth::guard('api')->user()->id)->get();
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
    //         $user = User::find(Auth::guard('api')->user()->id);
    //         $check = LockerTransaction::where('locker_id', $request->locker_id)
    //             ->where('user_id', Auth::guard('api')->user()->id)
    //             ->where('status', "1")
    //             ->first();

    //         if ($check) {
    //             return parent::sendError('Please wait for Locker to open', 233);
    //         }

    //         $locker = new LockerTransaction;
    //         $locker->user_id = Auth::guard('api')->user()->id;
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
    //         $transactions->user_id = Auth::guard('api')->user()->id;
    //         $transactions->type = config('constants.TRANSACTIONS_TYPE.LOCKER');
    //         $transactions->title = "Locker #" . $id . " Test";
    //         $transactions->amount = 0;
    //         $transactions->account = "VitCoin";
    //         $transactions->remark = "For Test Locker";
    //         $transactions->balance = Auth::guard('api')->user()->ive_coin;
    //         $transactions->save();

    //         $locker = new LockerTransaction;
    //         $locker->user_id = Auth::guard('api')->user()->id;
    //         $locker->to_user_id = Auth::guard('api')->user()->id;
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
