<?php

namespace App\Http\Traits\PaymentGateway;

abstract class Payment
{
    public abstract static function isSufficientBalance(float $amount);
    public abstract static function expense(float $amount);
    public abstract static function getBalance();
}
