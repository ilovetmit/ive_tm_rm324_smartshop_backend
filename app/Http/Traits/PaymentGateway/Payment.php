<?php

namespace App\Http\Traits\PaymentGateway;

use App\Models\UserManagement\User;

abstract class Payment
{
    public abstract static function isSufficientBalance(float $amount);
    public abstract static function expense(float $amount);
    public abstract static function transfer(float $amount, User $to);
    public abstract static function getBalance();

    public abstract function __toString();
}
