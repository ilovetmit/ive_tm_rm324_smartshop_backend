<?php

namespace App\Http\Controllers\ProductManagement\OnSell;

use App\Models\ProductManagement\OnSell\ShopProductInventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyShopProductInventoryRequest;
use App\Http\Requests\StoreShopProductInventoryRequest;
use App\Http\Requests\UpdateShopProductInventoryRequest;
use Symfony\Component\HttpFoundation\Response;


class ShopProductInventoryController extends Controller
{
    public function index()
    {
        $shopProductInventories = ShopProductInventory::all();
        return view('product-management.on-sell.shop-product-inventories.index', compact('shopProductInventories'));
    }

    public function create()
    {
        // $permissions = Permission::all()->pluck('name', 'id');
        return view('product-management.on-sell.shop-product-inventories.create');
    }

    public function store(Request $request)
    {
        $shopProductInventory = ShopProductInventory::create($request->all());
        // $remittanceTransaction->hasTransaction()->sync($request->input('hasTransaction', []));
        return redirect()->route('ProductManagement.ShopProductInventories.index');
    }

    public function show(ShopProductInventory $shopProductInventory)
    {
        // $shopProductInventory->load('hasTransaction');
        return view('product-management.on-sell.shop-product-inventories.show', compact('shopProductInventory'));
    }

    public function edit(ShopProductInventory $shopProductInventory)
    {
        // $transactions = Transaction::all()->pluck('id');
        // $shopProductInventory->load('hasTransaction');
        return view('product-management.on-sell.shop-product-inventories.edit', compact('shopProductInventory'));
    }

    public function update(Request $request, ShopProductInventory $shopProductInventory)
    {
        $shopProductInventory->update($request->all());
        // $remittanceTransaction->hasPermission()->sync($request->input('permissions', []));
        return redirect()->route('ProductManagement.ShopProductInventories.index');
    }

    public function destroy(ShopProductInventory $shopProductInventory)
    {
        $shopProductInventory->delete();
        return back();
    }
    
    public function massDestroy(MassDestroyShopProductInventoryRequest $request)
    {
        ShopProductInventory::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
