<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Events\MissionCompleted;
use Illuminate\Support\Facades\Auth;
use Eskie\Multichain\Facades\MultiChain;

class VitcoinController extends Controller
{
    //TODO send signature, remove complete() function, transfer function, modularize
    public function mining(Request $request)
    {

        $isApprove = false;
        $signature = null;
        if (Redis::exists($request->mission)) {
            $lists = unserialize(Redis::get($request->mission));

            foreach ($lists as $key => $value) {
                if ($value === Auth::id()) {
                    $successSigned = openssl_sign(json_encode([
                        'coins'     =>  50,                      // should not be fixed
                        // 'address'   => Auth::guard('api')->user()->hasVitcoin->address
                    ]), $signature, file_get_contents(storage_path('vitcoin-private.pem')));

                    if ($successSigned) {
                        $isApprove = true;
                        unset($lists[$key]);
                        Redis::set($request->mission, serialize($lists));
                        break;
                    }
                }
            }
        }

        return [
            'isApprove' => $isApprove,
            'signature' => bin2hex($signature)
        ];
    }

    // Test api
    public function complete()
    {
        event(new MissionCompleted('M-324-15', Auth::id()));
    }

    // Test API
    public function test()
    {
        $successSigned = openssl_sign(json_encode([
            'coins'     =>  50,                      // should not be fixed
            // 'address'   => Auth::guard('api')->user()->hasVitcoin->address
        ]), $signature, file_get_contents(storage_path('vitcoin-private.pem')));

        if ($successSigned) {
            return $signature;
        } else {
            return 'asdas';
        }
    }
}
