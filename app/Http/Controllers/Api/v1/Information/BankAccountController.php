<?php

namespace App\Http\Controllers\Api\v1\Information;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Information\BankAccountResource;
use App\Models\InformationManagement\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankAccountController extends ApiController
{
    public function getBank()
    {
        try {
            $bank = BankAccount::where('user_id', Auth::guard('api')->user()->id)->first();
            return parent::sendResponse('data', $bank, 'Bank Data');
        } catch (\Exception $e) {
            return parent::sendError('bank.', 216);
        }
    }
}
