<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ShopProductResource;
use App\Models\ProductManagement\OnSell\ShopProduct;
use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    public function getAll()
    {
        $model = ShopProduct::all();
        return ShopProductResource::collection($model);
    }
}
