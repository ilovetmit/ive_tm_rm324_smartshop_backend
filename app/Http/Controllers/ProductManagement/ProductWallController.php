<?php

namespace App\Http\Controllers\ProductManagement;

use App\Models\ProductManagement\ProductWall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductWallController extends Controller
{
    public function index()
    {
        $productWalls = ProductWall::all();
        return view('ProductManagement.Product.index', compact('productWalls'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(ProductWall $productWall)
    {
        
    }

    public function edit(ProductWall $product_wall)
    {
        
    }

    public function update(Request $request, ProductWall $productWall)
    {
        
    }

    public function destroy(ProductWall $productWall)
    {
        
    }
}
