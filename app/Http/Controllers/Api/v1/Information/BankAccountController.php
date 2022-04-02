<?php

namespace App\Http\Controllers\Api\v1\Information;

use App\Events\QRCodeLogin;
use App\Http\Controllers\Api\v1\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\PaymentGateway\Vitcoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

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

    public function banking_login(Request $request)
    {
        try {
            if (!$request->token) {
                return parent::sendError('No authentication token issued', 215);
            }

            $token = $request->token;
            if (Redis::get($request->token)) {      // check is it expired
                $one_time_password = Str::random(128);
                event(new QRCodeLogin($token, $one_time_password));   // boardcast to the channel

                // store api_token to the Redis for authorization
                $access_token = DB::table('oauth_access_tokens')->where('user_id',Auth::guard('api')->user()->id)->orderBy('created_at','desc')->first()->id;
                Redis::set($one_time_password, $access_token , 'EX', 30);
                Redis::del($token);
                return parent::sendResponse('token', $token, 'Login successfully');
            } else {
                event(new QRCodeLogin($token, 'REFRESH'));
                return parent::sendError('Token has expired', 215);
            }
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }
}
