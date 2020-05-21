<?php

namespace App\Http\Controllers;

use App\Models\SmartBankManagement\Insurance;
use App\Models\SmartBankManagement\Stock;
use App\Models\TransactionManagement\Transaction;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use App\Events\QRCodeLogin;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SmartBankingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Dashboard Page
     */
    public function dashboard()
    {
        return view('user-panel.smart-banking.dashboard.index');
    }

    /**
     * Insurance
     */
    public function insurance()
    {
        $rows = Insurance::all();
        return view('user-panel.smart-banking.insurance.index', compact('rows'));
    }

    public function insurance_detail($id)
    {
        $insurance = Insurance::find($id);
        return view('user-panel.smart-banking.insurance.detail', compact('insurance'));
    }

    public function insurance_subscribe($id, $type)
    {
        // todo

        //        $insurance = Insurance::find($id);
        //        $user = User::find(auth()->user()->user_id);
        //
        //
        //        if($type === 'free') {
        //            $price = 0;
        //        } else {
        //            $price = $insurance->price[$type];
        //        }
        //
        //        if($user->saving_account < $price) {
        //            session()->flash('fail', "You do not have enough Money");
        //            return redirect()->action('SmartBankingController@insurance_detail', $insurance->id);
        //        } else {
        //            $user->saving_account = $user->saving_account - $price;
        //            $user->save();
        //        }
        //
        //        $transactions = new Transactions;
        //        $transactions->user_id = auth()->user()->user_id;
        //        $transactions->type = config('constants.TRANSACTIONS_TYPE.INSURANCE');
        //        $transactions->title = "Insurance -" . $insurance->name . ' (' . $type . ')';
        //        $transactions->amount = $price;
        //        $transactions->account = 'Saving';
        //
        //        $transactions->balance = $user->saving_account;
        //        $transactions->save();

        //        session()->flash('message', $insurance->name . " (" . $type . ") Plan Subscribe successful!");
        session()->flash('message', " (" . $type . ") Plan Subscribe successful!");
        return redirect()->action('SmartBankingController@transaction');
    }

    /**
     * Login Page
     */
    public function login()
    {
        if (Auth::check())
            return redirect()->route('sbanking.dash');

        return view('user-panel.smart-banking.login.text');
    }

    public function login_qr()
    {
        if (Auth::check())
            return redirect()->route('sbanking.dash');

        $token = Str::random(64);              // token for generating qr code and the name of event
        Redis::set($token, 'waiting-auth');
        return view('user-panel.smart-banking.login.qr', compact('token'));
    }

    public function login_qr_approve(Request $request)
    {
        if (Auth::check())
            return redirect()->route('sbanking.dash');

        if (!isset($request->one_time_password)) {
            return redirect('/' . USER);
        }

        if ($token = Redis::get($request->one_time_password)) {
            Redis::del($request->one_time_password);

            $id = User::where('api_token', $token)->first()->user_id;
            Auth::loginUsingId($id);
            return redirect()->route('sbanking.dash');
        } else {
            return redirect('/' . USER);
        }
    }

    /**
     * Stock
     */
    public function stock()
    {
        $rows = Stock::all();
        return view('user-panel.smart-banking.stock.index', compact('rows'));
    }

    /**
     * Transaction
     */
    public function transaction()
    {
        $rows = Transaction::where('user_id', auth::id())->get();
        return view('user-panel.smart-banking.transaction.index', compact('rows'));
    }

    /**
     * Transfer
     */
    public function transfer()
    {
        $users = User::orderBy('email', 'asc')->get();
        return view('user-panel.smart-banking.transfer.index', compact('users'));
    }

    public function transfer_action(Request $request)
    {
        //todo update transfer action

        //        $this->validate($request, [
        //            'from' => 'required',
        //            'to' => 'required',
        //            'to_account' => 'required',
        //            'amount' => 'required|min:0',
        //        ]);
        //
        //        if(($request->from == "Saving" || $request->from == "Current") && $request->to_account == "VitCoin") {
        //            session()->flash('fail', "Data Error.");
        //            return redirect()->action('SmartBankingController@transfer');
        //        }
        //
        //        $user = User::find(auth()->user()->user_id);
        //
        //        if($request->amount < 0) {
        //            session()->flash('fail', "Data Error.");
        //            return redirect()->action('SmartBankingController@transfer');
        //        }
        //
        //
        //        if($toUser = User::where('email', $request->to)->first()) {
        //            if($request->from == 'VitCoin') {
        //                if($request->amount > $user->ive_coin) {
        //                    session()->flash('fail', "You do not have enough Vit Coin");
        //                    return redirect()->action('SmartBankingController@transfer');
        //                }
        //                $userBalance = $user->ive_coin = $user->ive_coin - $request->amount;
        //                $toUserBalance = $toUser->ive_coin = $toUser->ive_coin + $request->amount;
        //                $user->save();
        //                $toUser->save();
        //            } elseif($request->from == 'Saving') {
        //                if($request->amount > $user->saving_account) {
        //                    session()->flash('fail', "You do not have enough Money");
        //                    return redirect()->action('SmartBankingController@transfer');
        //                }
        //                $userBalance = $user->saving_account = $user->saving_account - $request->amount;
        //                if($request->to_account == 'Saving') {
        //                    $toUserBalance = $toUser->saving_account = $toUser->saving_account + $request->amount;
        //                } elseif($request->to_account == 'Current') {
        //                    $toUserBalance = $toUser->current_account = $toUser->current_account + $request->amount;
        //                }
        //                $toUser->save();
        //                $user->save();
        //            } elseif($request->from == 'Current') {
        //                if($request->amount > $user->current_account) {
        //                    session()->flash('fail', "You do not have enough Money");
        //                    return redirect()->action('SmartBankingController@transfer');
        //                }
        //
        //                $userBalance = $user->current_account = $user->current_account - $request->amount;
        //                if($request->to_account == 'Saving') {
        //                    $toUserBalance = $toUser->saving_account = $toUser->saving_account + $request->amount;
        //                } elseif($request->to_account == 'Current') {
        //                    $toUserBalance = $toUser->current_account = $toUser->current_account + $request->amount;
        //                }
        //                $toUser->save();
        //                $user->save();
        //            } else {
        //                session()->flash('fail', "Payment Error");
        //                return redirect()->action('SmartBankingController@transfer');
        //            }
        //        } else {
        //            session()->flash('fail', "No such User found.");
        //            return redirect()->action('SmartBankingController@transfer');
        //        }
        //
        //        $transactions = new Transactions;
        //        $transactions->user_id = auth()->user()->user_id;
        //        $transactions->type = config('constants.TRANSACTIONS_TYPE.TRANSFER');
        //        $transactions->title = "Transfer to " . $request->to . " (" . $request->to_account . ")";
        //        $transactions->amount = $request->amount;
        //        $transactions->account = $request->from;
        //        $transactions->remark = $request->remark;
        //        $transactions->balance = $userBalance;
        //        $transactions->save();
        //
        //        $transactions = new Transactions;
        //        $transactions->user_id = $toUser->user_id;
        //        $transactions->type = config('constants.TRANSACTIONS_TYPE.TRANSFER');
        //        $transactions->title = "Transfer from " . $user->email . " (" . $request->get('from') . ")";
        //        $transactions->amount = $request->get('amount');
        //        $transactions->account = $request->get('to_account');
        //        $transactions->remark = $request->get('remark');
        //        $transactions->balance = $toUserBalance;
        //        $transactions->save();

        session()->flash('message', "Transfer Successful");
        return redirect()->action('SmartBankingController@transfer');
    }
}
