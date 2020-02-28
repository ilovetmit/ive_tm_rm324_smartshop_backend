<?php

namespace App\Http\Controllers\ProductManagement\OnSell;

use App\Models\ProductManagement\OnSell\ShopProductInventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopProductInventoryController extends Controller
{
    public function index()
    {
        $shopProductInventories = ShopProductInventory::all();
        return view('ProductManagement.OnSell.ShopProductInventories.index', compact('shopProductInventories'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(ShopProductInventory $shopProductInventory)
    {
        
    }

    public function edit(ShopProductInventory $shopProductInventory)
    {
        
    }

    public function update(Request $request, ShopProductInventory $shopProductInventory)
    {
        
    }

    public function destroy(ShopProductInventory $shopProductInventory)
    {
        
    }
}
