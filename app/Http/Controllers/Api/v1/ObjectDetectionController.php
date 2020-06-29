<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\ObjectDetection;
use App\Models\ProductManagement\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class ObjectDetectionController extends ApiController
{
    public function object_list(Request $request)
    {
        try {
            $request = $request->json()->all();
            $product_data = $request['product'];
            $product_list = [];
            foreach ($product_data as $datas) {
                foreach ($datas as $data) {
                    if (array_key_exists($data, $product_list)) {
                        $product_list[$data]['amount'] += 1;
                    } else {
                        $product_list[$data] = [
                            'id' => $data,
                            'amount' => 1,
                            'product_detail' => Product::find($data),
                        ];
                    }
                }
            }

            $product_names = array_keys($product_list);
            foreach ($product_names as $names) {
                $product_list[$names]['amount'] /= 10;
            }

            if (count($product_list) != 0) {
                event(new ObjectDetection($product_list));
            }
            return parent::sendResponse('object', "true", 'Object Detection successfully');
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 215);
        }
    }
}
