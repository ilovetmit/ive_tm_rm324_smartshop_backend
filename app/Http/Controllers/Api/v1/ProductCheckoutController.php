<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\RFID;
use App\Models\ProductManagement\OnSell\ShopProductInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


class ProductCheckoutController extends ApiController {

    public function checkout(Request $request){
        $token = $request->token;
        if(Cache::tags('checkout')->has($token)) {
            $product = Cache::tags('checkout')->get($token);

            // todo Check money, check stock

            // todo Payment currency and RFID update status

            return parent::sendResponse('data', $product, 'Product list Cache data');
        }else{
            return parent::sendError('Token Expired', 215);
        }
    }
}
