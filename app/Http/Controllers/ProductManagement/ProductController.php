<?php

namespace App\Http\Controllers\ProductManagement;

use App\Models\ProductManagement\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('ProductManagement.Products.index', compact('products'));
    }

    public function create()
    {
        // $permissions = Permission::all()->pluck('name', 'id');
        return view('ProductManagement.Products.create');
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        // $remittanceTransaction->hasTransaction()->sync($request->input('hasTransaction', []));
        return redirect()->route('ProductManagement.Products.index');
    }

    public function show(Product $product)
    {
        // $product->load('hasTransaction');
        return view('ProductManagement.Products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        // $transactions = Transaction::all()->pluck('id');
        // $product->load('hasTransaction');
        return view('ProductManagement.Products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        // $remittanceTransaction->hasPermission()->sync($request->input('permissions', []));
        return redirect()->route('ProductManagement.Products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
