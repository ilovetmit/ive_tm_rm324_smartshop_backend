<?php

namespace App\Http\Traits\PaymentGateway;

use Illuminate\Support\Facades\Auth;

class SavingAccount extends Payment
{
    public static function isSufficientBalance(float $amount)
    {
        return self::getBalance() >= $amount;
    }

    public static function expense(float $amount)
    {
        return tap(Auth::guard('api')->user()->hasBankAccount)->decrement('saving_account', $amount)->saving_account;
    }

    public static function getBalance()
    {
        return Auth::guard('api')->user()->hasBankAccount->saving_account;
    }
}
