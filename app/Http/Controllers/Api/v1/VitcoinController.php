<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Events\MissionCompleted;
use Illuminate\Support\Facades\Auth;

class VitcoinController extends Controller
{
    //TODO send signature, remove complete() function, transfer function, modularize 
    public function mining(Request $request)
    {

        $isApprove = false;
        if (Redis::exists($request->mission)) {
            $lists = unserialize(Redis::get($request->mission));
            foreach ($lists as $key => $value) {
                if ($value == Auth::guard('api')->id()) {
                    $isApprove = true;
                    unset($lists[$key]);
                    Redis::set($request->mission, serialize($lists));
                    break;
                }
            }
        }

        return [
            'isApprove' => $isApprove,
            'signature' => null
        ];
    }

    public function complete()
    {
        event(new MissionCompleted('M-324-15', Auth::guard('api')->id()));  // Test api
    }
}
