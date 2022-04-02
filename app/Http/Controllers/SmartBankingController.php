<?php

namespace App\Http\Controllers;

use App\Models\SmartBankManagement\Insurance;
use App\Models\SmartBankManagement\Stock;
use App\Models\TransactionManagement\Transaction;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use App\Events\QRCodeLogin;
use App\Models\InformationManagement\BankAccount;
use App\Models\TransactionManagement\RemittanceTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Traits\PaymentGateway\Vitcoin;

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
        $bank = Auth::user()->hasBankAccount;
        $bank['vit_coin'] = Vitcoin::getBalance();
        return view('user-panel.smart-banking.dashboard.index', compact('bank'));
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
        $insurance = Insurance::find($id);
        $user = User::find(auth::id());

        if ($type === 'free') {
            $price = 0;
        } else {
            $price = ($insurance->price)[$type];
        }

        if ($user->hasBankAccount->saving_account < $price) {
            session()->flash('fail', "You do not have enough Money");
            return redirect()->action('SmartBankingController@insurance_detail', $insurance->id);
        } else {
            $user->hasBankAccount->saving_account = $user->hasBankAccount->saving_account - $price;
            $user->save();
        }

        $transactions = new Transaction;
        $transactions->user_id = auth::id();
        $transactions->header = "Insurance - " . $insurance->name . ' (' . $type . ')';
        $transactions->amount = $price;
        $transactions->balance = $user->hasBankAccount->saving_account;
        $transactions->currency = 1; // 1 = saving account -> config.constant.transaction_currency
        $transactions->save();

        session()->flash('message', $insurance->name . " (" . $type . ") Plan Subscribe successful!");
        // session()->flash('message', " (" . $type . ") Plan Subscribe successful!");
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

            $id = DB::table('oauth_access_tokens')->where('id', $token)->orderBy('created_at','desc')->first()->user_id;
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
        $this->validate($request, [
            'from'          => 'required',      // from type
            'to'            => 'required',      // to who
            'to_account'    => 'required',      // account type
            'amount'        => 'required',      // amount
        ]);
        if (($request->from == "Saving" || $request->from == "Current") && $request->to_account == "VitCoin") {
            session()->flash('fail', "Saving and Current account can not tranfer to VitCoin.");
            return redirect()->action('SmartBankingController@transfer');
        }
        $user = User::find(auth::id());
        if ($request->amount < 0) {
            session()->flash('fail', "Data Error.");
            return redirect()->action('SmartBankingController@transfer');
        }
        // if ($toUser = User::where('email', $request->to)->first()) {
        // if ($request->from == 'VitCoin') {
        //     if ($request->amount > $user->ive_coin) {
        //         session()->flash('fail', "You do not have enough VitCoin");
        //         return redirect()->action('SmartBankingController@transfer');
        //     }
        //     $userBalance = $user->ive_coin = $user->ive_coin - $request->amount;
        //     $toUserBalance = $toUser->ive_coin = $toUser->ive_coin + $request->amount;
        //     $user->save();
        //     $toUser->save();
        // } elseif ($request->from == 'Saving') {
        //     if ($request->from == 'Saving') {
        //         if ($request->amount > $user->hasBankAccount->saving_account) {
        //             session()->flash('fail', "You do not have enough Money");
        //             return redirect()->action('SmartBankingController@transfer');
        //         }
        //         $userBalance = $user->hasBankAccount->saving_account = $user->hasBankAccount->saving_account - $request->amount;
        //         if ($request->to_account == 'Saving') {
        //             $toUserBalance = $toUser->hasBankAccount->saving_account + $request->amount;
        //         } elseif ($request->to_account == 'Current') {
        //             $toUserBalance = $toUser->hasBankAccount->current_account = $toUser->hasBankAccount->current_account + $request->amount;
        //         }
        //     } elseif ($request->from == 'Current') {
        //         if ($request->amount > $user->hasBankAccount->current_account) {
        //             session()->flash('fail', "You do not have enough Money");
        //             return redirect()->action('SmartBankingController@transfer');
        //         }
        //         $userBalance = $user->hasBankAccount->current_account = $user->hasBankAccount->current_account - $request->amount;
        //         if ($request->to_account == 'Saving') {
        //             $toUserBalance = $toUser->hasBankAccount->saving_account = $toUser->hasBankAccount->saving_account + $request->amount;
        //         } elseif ($request->to_account == 'Current') {
        //             $toUserBalance = $toUser->hasBankAccount->current_account = $toUser->hasBankAccount->current_account + $request->amount;
        //         }
        //     } else {
        //         session()->flash('fail', "Payment Error");
        //         return redirect()->action('SmartBankingController@transfer');
        //     }
        // } else {
        //     session()->flash('fail', "No such User found.");
        //     return redirect()->action('SmartBankingController@transfer');
        // }

        $current_amount = 0;
        $after_transfer_amount = 0;

        if ($request->from == 'Saving') {
            $current_amount = auth::user()->hasBankAccount->saving_account;
            BankAccount::where('id', auth::id())->update([
                'user_id'           => auth::id(),
                'current_account'   => auth::user()->hasBankAccount->current_account,
                'saving_account'    => $current_amount - $request->amount,
            ]);
        } elseif ($request->from == 'Current') {
            $current_amount = auth::user()->hasBankAccount->current_account;
            BankAccount::where('id', auth::id())->update([
                'user_id'           => auth::id(),
                'current_account'   => $current_amount - $request->amount,
                'saving_account'    => auth::user()->hasBankAccount->saving_account,
            ]);
        }
        $t_balance = $current_amount - $request->amount;

        $transactions = new Transaction;
        $transactions->header = "Transfer to " . $request->to . " (" . $request->to_account . ")";
        $transactions->user_id = auth::id();
        $transactions->amount = $request->amount;
        $transactions->balance = $t_balance;
        $transactions->currency = config('constant._transaction_currency')[$request->from];
        $transactions->save();

        $remittanceTransaction = new RemittanceTransaction;
        $remittanceTransaction->transaction_id = Transaction::latest()->first()->id;
        $remittanceTransaction->payee_id = User::where('email', $request->to)->first()->id;
        $remittanceTransaction->save();

        if ($request->to_account == 'Saving') {
            $current_amount = User::where('email', $request->to)->first()->hasBankAccount->saving_account;
            BankAccount::where('id', User::where('email', $request->to)->first()->id)->update([
                'user_id'           => User::where('email', $request->to)->first()->id,
                'current_account'   => User::where('email', $request->to)->first()->hasBankAccount->current_account,
                'saving_account'    => $current_amount + $request->amount,
            ]);
        } elseif ($request->to_account == 'Current') {
            $current_amount = User::where('email', $request->to)->first()->hasBankAccount->current_account;
            BankAccount::where('id', User::where('email', $request->to)->first()->id)->update([
                'user_id'           => User::where('email', $request->to)->first()->id,
                'current_account'   => $current_amount + $request->amount,
                'saving_account'    => User::where('email', $request->to)->first()->hasBankAccount->saving_account,
            ]);
        }
        $t_balance = $current_amount + $request->amount;

        $transactions_r = new Transaction;
        $transactions_r->header = "Receive from " . $request->to . " (" . $request->to_account . ")";
        $transactions_r->user_id = User::where('email', $request->to)->first()->id;
        $transactions_r->amount = $request->amount;
        $transactions_r->balance = $t_balance;
        $transactions_r->currency = config('constant._transaction_currency')[$request->from];
        $transactions_r->save();


        session()->flash('message', "Transfer Successful");
        return redirect()->action('SmartBankingController@transfer');
    }
}
