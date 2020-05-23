<?php

namespace App\Http\Controllers\Api\v1\Information;

use App\Http\Controllers\Api\v1\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\PaymentGateway\Vitcoin;

class BankAccountController extends ApiController
{
    public function getBank()
    {
        try {
            $bank = Auth::guard('api')->user()->hasBankAccount;
            $bank['vit_coin'] = Vitcoin::getBalance();
            return parent::sendResponse('data', $bank, 'Bank Data');
        } catch (\Exception $e) {
            return parent::sendError('bank.', 216);
        }
    }
}
