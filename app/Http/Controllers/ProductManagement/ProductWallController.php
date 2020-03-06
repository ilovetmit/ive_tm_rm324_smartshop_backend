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
        return view('poduct-management.product-walls.index', compact('productWalls'));
    }

    public function create()
    {
         // $permissions = Permission::all()->pluck('name', 'id');
         return view('poduct-management.product-walls.create');
    }

    public function store(Request $request)
    {
        $productWall = ProductWall::create($request->all());
        // $remittanceTransaction->hasTransaction()->sync($request->input('hasTransaction', []));
        return redirect()->route('ProductManagement.ProductWalls.index');
    }

    public function show(ProductWall $productWall)
    {
        // $product->load('hasTransaction');
        return view('poduct-management.product-walls.show', compact('productWall'));
    }

    public function edit(ProductWall $productWall)
    {
         // $transactions = Transaction::all()->pluck('id');
        // $product->load('hasTransaction');
        return view('poduct-management.product-walls.edit', compact('productWall'));
    }

    public function update(Request $request, ProductWall $productWall)
    {
        $productWall->update($request->all());
        // $remittanceTransaction->hasPermission()->sync($request->input('permissions', []));
        return redirect()->route('ProductManagement.ProductWalls.index');
    }

    public function destroy(ProductWall $productWall)
    {
        $productWall->delete();
        return back();
    }
}