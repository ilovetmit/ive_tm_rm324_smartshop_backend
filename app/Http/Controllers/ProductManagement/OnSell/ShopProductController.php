<?php

namespace App\Http\Controllers\ProductManagement\OnSell;

use App\Models\ProductManagement\OnSell\ShopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopProductController extends Controller
{
    public function index()
    {
        $shopProducts = ShopProduct::all();
        return view('product-management.on-sell.shop-products.index', compact('shopProducts'));
    }

    public function create()
    {
        // $permissions = Permission::all()->pluck('name', 'id');
        return view('product-management.on-sell.shop-products.create');
    }

    public function store(Request $request)
    {
        $shopProduct = ShopProduct::create($request->all());
        // $remittanceTransaction->hasTransaction()->sync($request->input('hasTransaction', []));
        return redirect()->route('ProductManagement.ShopProducts.index');
    }

    public function show(ShopProduct $shopProduct)
    {
        // $shopProduct->load('hasTransaction');
        return view('product-management.on-sell.shop-products.show', compact('shopProduct'));
    }

    public function edit(ShopProduct $shopProduct)
    {
        // $transactions = Transaction::all()->pluck('id');
        // $shopProduct->load('hasTransaction');
        return view('product-management.on-sell.shop-products.edit', compact('shopProduct'));
    }

    public function update(Request $request, ShopProduct $shopProduct)
    {
        $shopProduct->update($request->all());
        // $remittanceTransaction->hasPermission()->sync($request->input('permissions', []));
        return redirect()->route('ProductManagement.ShopProducts.index');
    }

    public function destroy(ShopProduct $shopProduct)
    {
        $shopProduct->delete();
        return back();
    }
}
