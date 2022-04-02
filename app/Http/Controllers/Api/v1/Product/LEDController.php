<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\LEDResource;
use App\Models\ProductManagement\OnSell\LED;
use Illuminate\Http\Request;

class LEDController extends Controller
{
    public function getAll()
    {
        $model = LED::all();
        return LEDResource::collection($model);
    }
}
