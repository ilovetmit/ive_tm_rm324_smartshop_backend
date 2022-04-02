<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Events\MissionCompleted;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\MultiChain;
use App\Models\UserManagement\User;
use App\Http\Traits\PaymentGateway\Vitcoin;
use App\Models\InformationManagement\Vitcoin as VitcoinModel;

class VitcoinController extends Controller
{
    //TODO send signature, remove complete() function, transfer function, modularize
    public function mining(Request $request)
    {
        $result = ['isApprove' => false, 'signature' => null];

        if (Redis::exists($request->mission)) {
            $lists = unserialize(Redis::get($request->mission));

            foreach ($lists as $key => $value) {
                if ($value === Auth::id()) {
                    $successSigned = openssl_sign(json_encode([
                        'coins'     =>  50,                      // should not be fixed
                        'address'   => Auth::guard('api')->user()->hasVitcoin->address
                    ]), $signature, file_get_contents(storage_path('vitcoin-private.pem')));

                    if ($successSigned) {
                        $result['isApprove'] = true;
                        $result['signature'] = bin2hex($signature);
                        $result['coins'] = 50;                  // should not be fixed
                        $result['wallet'] = $this->wallet();

                        unset($lists[$key]);
                        Redis::set($request->mission, serialize($lists));
                        break;
                    }
                }
            }
        }
        return $result;
    }

    // Test api
    public function complete()
    { 
        event(new MissionCompleted('M-324-15', Auth::id()));
    }

    public function wallet()
    {
        return Auth::guard('api')->user()->hasVitcoin;
    }
}
