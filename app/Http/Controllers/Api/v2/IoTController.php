<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\LockerManagement\Locker;
use App\Models\LockerTransaction;
use App\Models\ProductManagement\OnSell\LED;
use App\Models\ProductManagement\VendingMachine\VendingProduct;
use App\Models\Vending;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;


class IoTController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function error() {
        return response()->json(array(
            'status' => 'FAIL',
            'msg' => 'Wrong URL'
        ));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function price() {
        $rows = Led::with('hasShopProduct','hasShopProduct.hasProduct')->get();
        foreach ($rows as $index => $data) {
            $response['led_0' . ($index + 1)] = $data->hasShopProduct->hasProduct->price;
        }
        return response()->json($response, 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function sensor() {
//    $rows = Led::where('type', 2)->first();
//    $data = unserialize($rows->data);
//    foreach ($data as $index => $number) {
//      $response['led_0' . ($index + 1)] =  $number;
//    }
        $num1 = rand(242, 254);
        $num2 = rand(550, 580);
        $response['led_01'] = $num1;
        $response['led_02'] = $num2;
//    $rows->data = array($num1+rand (-2,2), $num2+rand (-2,2));
//    $rows->save();
        return response()->json($response, 200);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function locker() {
        $response = [
            'current' => -1,
        ];
        $check = Locker::where('status', 1)->orderBy('updated_at')->first();
        if($check) {
            $check->status = 0;
            $check->save();
            $response = [
                'current' => $check->id,
            ];
            return response()->json($response, 200);
        }
        return response()->json($response, 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function vending() {
        $response = [
            'current' => -1,
        ];
        $channel = Cache::get('vending_queue');
        if(is_array($channel)){
            if(sizeof($channel)>0) {
                $response = [
                    'current' => (int)array_shift($channel),
                ];
                Cache::put('vending_queue',$channel);
                return response()->json($response, 200);
            }
        }

        return response()->json($response, 200);
    }
}
