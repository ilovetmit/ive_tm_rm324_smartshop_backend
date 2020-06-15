<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\RFID;
use App\Models\ProductManagement\OnSell\ShopProductInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class RFIDController extends ApiController {
    public function rfid_scan(Request $request) {
        try {
            if(!$request->rfid) {
                return parent::sendError('No authentication token issued', 210);
            }

            $data = $request->rfid;

            $rfid = "";
            $products = [];
            $productCount = 0;
            $resultCount = 0;
            $resultIsSoldCount = 0;

            if(strlen($data) > 16) {
                if(strlen($data) % 48 == 0) {
                    $productCount = strlen($data) / 48;
                    for($i = 0; $i<$productCount;$i++){
                        $rfid = substr($data,16+($i*48),24);
                        if($rfid = ShopProductInventory::with('hasShopProduct', 'hasShopProduct.hasProduct')->where('rfid_code', $rfid)->first()) {
                            if($rfid->is_sold == 1) {
                                $rfid->hasShopProduct->hasProduct->image = asset($rfid->hasShopProduct->hasProduct->image);
                                event(new RFID($rfid));   // boardcast to the channel
                                $resultCount++;
                                array_push($products,$rfid);
                            }else{
                                $resultIsSoldCount++;
                            }
                        }
                    }
                }else{
                    return parent::sendError('Data Format Error', 209);
                }
            }else{
                return parent::sendError('Data Error', 210);
            }

            if($resultCount==0){
                return parent::sendError('Not found product', 211);
            }elseif($resultCount<$productCount){
                if($resultIsSoldCount>0){
                    return parent::sendError('Some product cannot be purchased', 212);
                }else{
                    return parent::sendError('Some product Not fount', 213);
                }
            }elseif($resultCount==$productCount){
                return parent::sendResponse('rfid', $products, 'RFID successfully');
            }



        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 215);
        }
    }

}
