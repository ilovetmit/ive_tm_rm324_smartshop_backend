<?php

namespace App\Http\Traits;

use App\Models\TransactionManagement\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\InformationManagement\BankAccount;
use Eskie\Multichain\Facades\MultiChain;

class PaymentType extends Enum
{
    const CURRENT = 0;
    const SAVING = 1;
    const VITCOIN = 2;
}

// Semi-Finish, roughly oo design
class PaymentGatewayTrait
{
    public static function createTransaction(Payment $type, float $amount, string $header)
    {
        if ($type->isSufficientBalance($amount)) {
            $balance = $type->expense($amount);
            $transaction = Transaction::create([
                'header'    =>  $header,
                'amount'    =>  $amount,
                'balance'   =>  $balance,
                'currency'  =>  $currency
            ]);
            return ['stateCode' => 0, 'transaction' => $transaction];
        } else {
            return ['stateCode' => 1, 'message' => 'Insufficient Balance'];
        }
    }
}

abstract class Payment
{
    public abstract function isSufficientBalance(float $amount);
    public abstract function expense(float $amount);
}

class CurrentAccountPayment extends Payment
{
    public function isSufficientBalance(float $amount)
    {
        return Auth::guard('api')->user()->hasBankAccount->current_account >= $amount;
    }

    public function expense(float $amount)
    {
        return tap(Auth::guard('api')->user()->hasBankAccount)->decrement('current_account', $amount)->current_account;;
    }
}

class SavingAccountPayment extends Payment
{
    public function isSufficientBalance(float $amount)
    {
        return Auth::guard('api')->user()->hasBankAccount->saving_account >= $amount;
    }

    public function expense(float $amount)
    {
        return tap(Auth::guard('api')->user()->hasBankAccount)->decrement('saving_account', $amount)->saving_account;
    }
}

class VitcoinPayment extends Payment
{
    public function isSufficientBalance(float $amount)
    {
        $address = Auth::guard('api')->user()->hasVitcoin->address;

        $balanceLists = MultiChain::getAddressBalances($address);

        $balance = $balanceLists[array_search('VitCoin', array_column($balanceLists, 'name'))]['qty'];

        return $balance >= $amount;
    }

    public function expense(float $amount)
    {
        //
    }
}
