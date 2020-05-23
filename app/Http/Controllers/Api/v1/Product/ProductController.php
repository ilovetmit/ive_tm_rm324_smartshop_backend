<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\ProductManagement\Product;
use App\Models\ProductManagement\ProductWall;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    // public function getAll()
    // {
    //     $model = Product::all();
    //     return ProductResource::collection($model);
    // }

    public function products()
    {
        try {
            $product = Product::with('hasCategory')->paginate(10);
            return parent::sendResponse('data', $product, 'All Product Data');
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }


    public function product_detail($id)
    {
        try {

            $headerTitle = "PRODUCT";

            $check_wall_qr = substr($id, 0, 4);
            if ($check_wall_qr == "wall") {
                $qr_wall_id = ProductWall::where('qrcode', $id)->first();
                $id = $qr_wall_id->product_id;
                $headerTitle = $qr_wall_id->message;
            }

            $product = Product::find($id);
            $product->header = $headerTitle;
            if ($product) {
                return parent::sendResponse('data', $product, 'Product Data');
            } else {
                return parent::sendError('Product information expired', 216);
            }
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }
}
