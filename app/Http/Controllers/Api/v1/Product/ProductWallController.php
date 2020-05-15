<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductWallResource;
use App\Models\ProductManagement\ProductWall;
use Illuminate\Http\Request;

class ProductWallController extends Controller
{
    public function getAll()
    {
        $model = ProductWall::all();
        return ProductWallResource::collection($model);
    }
}
