<?php

namespace App\Http\Traits\PaymentGateway;

use Illuminate\Support\Facades\Auth;

class CurrentAccount extends Payment
{
    public static function isSufficientBalance(float $amount)
    {
        return self::getBalance() >= $amount;
    }

    public static function expense(float $amount)
    {
        return tap(Auth::guard('api')->user()->hasBankAccount)->decrement('current_account', $amount)->current_account;
    }

    public static function getBalance()
    {
        return Auth::guard('api')->user()->hasBankAccount->current_account;
    }
}
