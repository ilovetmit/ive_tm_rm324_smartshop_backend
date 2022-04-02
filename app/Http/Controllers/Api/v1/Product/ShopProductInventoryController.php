<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ShopProductInventoryResource;
use App\Models\ProductManagement\OnSell\ShopProductInventory;
use Illuminate\Http\Request;

class ShopProductInventoryController extends Controller
{
    public function getAll()
    {
        $model = ShopProductInventory::all();
        return ShopProductInventoryResource::collection($model);
    }
}
