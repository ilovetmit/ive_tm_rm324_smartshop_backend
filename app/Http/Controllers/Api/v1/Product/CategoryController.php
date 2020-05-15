<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\CategoryResource;
use App\Models\ProductManagement\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll()
    {
        $model = Category::all();
        return CategoryResource::collection($model);
    }
}
