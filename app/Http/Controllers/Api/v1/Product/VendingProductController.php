<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\VendingProductResource;
use App\Models\ProductManagement\VendingMachine\VendingProduct;
use Illuminate\Http\Request;

class VendingProductController extends Controller
{
    public function getAll()
    {
        $model = VendingProduct::all();
        return VendingProductResource::collection($model);
    }
}
