<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\RFID;
use App\Http\Controllers\Api\ApiController;
use App\Models\ProductManagement\OnSell\ShopProductInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class RFIDController extends ApiController {
    public function rfid_scan(Request $request) {
        try {
            if(!$request->rfid) {
                return parent::sendError('No authentication token issued', 215);
            }

            $rfid = $request->rfid;
            if($rfid = ShopProductInventory::with('hasShopProduct','hasShopProduct.hasProduct')->where('rfid_code', $rfid)->first()) {
                // todo update image link
                $rfid->hasShopProduct->hasProduct->image = asset($rfid->hasShopProduct->hasProduct->image);

                event(new RFID($rfid));   // boardcast to the channel
                return parent::sendResponse('rfid', $rfid, 'RFID successfully');
            }
            return parent::sendError('Not fount product', 215);

        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }

}
