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
        $data = $request->all();
        if (isset($request->rfid_code)) {
            $photoTypes = array('png', 'jpg', 'jpeg');
            $extension = $request->file('rfid_code')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('rfid_code')->store('public/shop_product_inventory/rfid_code');
                $data['rfid_code'] = basename($file);
            } else {
                return back()->withErrors('Create Fail, Image type error, only png, jpg, jpeg');
            }
        }
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
        $data = $request->all();
        if (isset($request->rfid_code)) {
            $photoTypes = array('png', 'jpg', 'jpeg');
            $extension = $request->file('rfid_code')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('rfid_code')->store('public/shop_product_inventory/rfid_code');
                $data['rfid_code'] = basename($file);
            } else {
                return back()->withErrors('Create Fail, Image type error, only png, jpg, jpeg');
            }
        }
        $shopProductInventory->update($request->all());
        // $shopProductInventory = ShopProductInventory::create($data);
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
