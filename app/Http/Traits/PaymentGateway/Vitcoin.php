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
        $result = 0;
        try {
            $address = Auth::guard('api')->user()->hasVitcoin->address;

            $balanceLists = (new MultiChain)->getaddressbalances($address);

            $result = $balanceLists[array_search('VitCoin', array_column($balanceLists, 'name'))]['qty'];
        } catch (\Throwable $th) {
            \Log::debug('Vitcoin getBalance error');
        }
        return $result;
    }

    public static function createkeypairs()
    {
        $Multichain = new MultiChain;

        $keypairs = $Multichain->createkeypairs()[0];

        $keypairs['public_key'] = $keypairs['pubkey'];
        $keypairs['primary_key'] = $keypairs['privkey'];

        unset($keypairs['pubkey']);
        unset($keypairs['privkey']);

        $Multichain->importaddress($keypairs['address']);
        $Multichain->grant($keypairs['address'], 'issue,receive,send');
        $Multichain->grant($keypairs['address'], 'Vitcoin.issue,receive,send');

        return $keypairs;
    }
}
