<?php

namespace App\Http\Controllers\ProductManagement\OnSell;

use App\Models\ProductManagement\OnSell\ShopProductInventory;
use App\Models\ProductManagement\OnSell\ShopProduct;
use App\Models\ProductManagement\Product;
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
        $shopProductInventories = ShopProductInventory::all();
        $shopProducts = ShopProduct::all();
        return view('product-management.on-sell.shop-product-inventories.create', compact('shopProducts', 'shopProductInventories'));
    }

    public function store(Request $request)
    {
        $messages = [
            'rfid_code.regex' => 'The rfid_code format should be 16 character',
        ];

        $request->validate([
            'shop_product_id'   => 'required',
            'rfid_code'         => 'required|regex:(([a-zA-Z0-9]){16})|unique:shop_product_inventories',
            'is_sold'           => 'required',
        ], $messages);

        $data = $request->all();
        $shopProductInventory = ShopProductInventory::create($data);
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
        $shopProducts = ShopProduct::all();
        $shopProductInventory->load('hasShopProduct');
        return view('product-management.on-sell.shop-product-inventories.edit', compact('shopProductInventory', 'shopProducts'));
    }

    public function update(Request $request, ShopProductInventory $shopProductInventory)
    {
        $messages = [
            'rfid_code.regex' => 'The rfid_code format should be 16 character',
        ];

        $request->validate([
            'shop_product_id'   => 'required',
            'rfid_code'         => 'required|regex:(([a-zA-Z0-9]){16})|unique:shop_product_inventories,rfid_code' . ($shopProductInventory->id ? ",$shopProductInventory->id" : ''),
            'is_sold'           => 'required',
        ], $messages);
        
        $data = $request->all();
        $shopProductInventory->update($request->all());
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
