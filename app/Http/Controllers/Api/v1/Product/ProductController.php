<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\ProductManagement\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAll()
    {
        $model = Product::all();
        return ProductResource::collection($model);
    }
}
