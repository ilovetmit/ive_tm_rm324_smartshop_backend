<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Events\MissionCompleted;
use Illuminate\Support\Facades\Auth;
use App\Models\Mission;

class VitcoinController extends ApiController
{
    public function mining(Request $request)
    {
        $result = ['isApprove' => false, 'signature' => null];

        if (Redis::exists($request->mission)) {
            $lists = unserialize(Redis::get($request->mission));

            foreach ($lists as $key => $value) {
                if ($value === Auth::id()) {
                    $coins = Mission::where('name', $request->mission)->first()->coins;
                    $successSigned = openssl_sign(json_encode([
                        'coins'     => $coins,
                        'address'   => Auth::guard('api')->user()->hasVitcoin->address
                    ]), $signature, file_get_contents(storage_path('vitcoin-private.pem')));

                    if ($successSigned) {
                        $result['isApprove'] = true;
                        $result['signature'] = bin2hex($signature);
                        $result['coins'] = $coins;
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
