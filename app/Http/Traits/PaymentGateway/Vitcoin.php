<?php

namespace App\Http\Traits\PaymentGateway;

use Illuminate\Support\Facades\Auth;
use App\Http\Traits\MultiChain;
use App\Models\UserManagement\User;


class Vitcoin extends Payment
{
    public static function isSufficientBalance(float $amount)
    {
        return self::getBalance() >= $amount;
    }

    public static function expense(float $amount)
    {
        return Vitcoin::transfer($amount, User::find(1));   // to admin
    }

    public static function transfer(float $amount, User $to)
    {
        $result = false;
        try {
            $fromAddress = Auth::guard('api')->user()->hasVitcoin->address;
            $toAddress = User::find(1)->hasVitcoin->address;
            $Multichain = new MultiChain;

            $rawData = $Multichain->createrawsendfrom($fromAddress, [$toAddress => ["Vitcoin" => $amount]]);
            if (gettype($rawData) == "string") {    // return hex string means success
                $signedRawHexData = $Multichain->signrawtransaction($rawData, [], [Auth::guard('api')->user()->hasVitcoin->primary_key]);

                if ($signedRawHexData['complete'] == true) {    // means success
                    $response = $Multichain->sendrawtransaction($signedRawHexData['hex']);
                    if (gettype($response) == 'string') {
                        $result = true;
                    } else {
                        $response['error-position'] = 'VitcoinController sendrawtransaction()';
                        \Log::debug(json_encode($response));
                    }
                } else {
                    $signedRawHexData['error-position'] = 'VitcoinController signrawtransaction()';
                    \Log::debug(json_encode($signedRawHexData));
                }
            } else {
                $rawData['error-position'] = 'VitcoinController createrawsendfrom()';
                \Log::debug(json_encode($rawData));
            }
        } catch (\Throwable $th) {
            \Log::debug('Vitcoin transfer error');
        }
        return $result;
    }

    public static function getBalance(User $user = null)
    {
        $result = 0;
        try {
            if ($user == null)
                $address = Auth::guard('api')->user()->hasVitcoin->address;
            else
                $address = $user->hasVitcoin->address;

            $balanceLists = (new MultiChain)->getaddressbalances($address);
            if (!($balanceLists === [])) {
                $result = $balanceLists[array_search('VitCoin', array_column($balanceLists, 'name'))]['qty'];
            }
        } catch (\Throwable $th) {
            $result = -1;
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

        $Multichain->importaddress($keypairs['address'], '', false);        // test
        $Multichain->grant($keypairs['address'], 'issue,receive,send');
        $Multichain->grant($keypairs['address'], 'Vitcoin.issue,receive,send');

        return $keypairs;
    }

    public function __toString()
    {
        return PaymentType::VITCOIN;
    }
}
