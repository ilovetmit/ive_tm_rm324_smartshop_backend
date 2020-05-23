<?php

namespace App\Http\Traits\PaymentGateway;

use Illuminate\Support\Facades\Auth;
use App\Http\Traits\MultiChain;

class Vitcoin extends Payment
{
    public static function isSufficientBalance(float $amount)
    {
        return self::getBalance() >= $amount;
    }

    public static function expense(float $amount)
    {
        //
    }

    public static function getBalance()
    {
        $result = null;
        try {
            $address = Auth::guard('api')->user()->hasVitcoin->address;

            $balanceLists = (new MultiChain)->getaddressbalances($address);

            $result = $balanceLists[array_search('VitCoin', array_column($balanceLists, 'name'))]['qty'];
        } catch (\Throwable $th) {
            \Log::debug('Vitcoin getBalance error');
        }
        return $result;
    }
}
