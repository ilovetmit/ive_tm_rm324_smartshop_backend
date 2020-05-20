<?php

namespace App\Http\Controllers\ProductManagement\OnSell;

use App\Models\ProductManagement\OnSell\ShopProduct;
use App\Models\ProductManagement\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyShopProductRequest;
use App\Http\Requests\StoreShopProductRequest;
use App\Http\Requests\UpdateShopProductRequest;
use Symfony\Component\HttpFoundation\Response;


class ShopProductController extends Controller
{
    public function index()
    {
        $shopProducts = ShopProduct::all();
        return view('product-management.on-sell.shop-products.index', compact('shopProducts'));
    }

    public function create()
    {
        $products = Product::all();
        return view('product-management.on-sell.shop-products.create', compact('products'));
    }

    public function store(Request $request)
    {
        $messages = [
            'qrcode.regex' => 'The qrcode format should start with "PRODUCT-"',
        ];

        $request->validate([
            'product_id'    => 'required',
            'qrcode'        => 'required|regex:((PRODUCT-)([a-zA-Z0-9]){1,})|unique:shop_products',
        ], $messages);

        $data = $request->all();
        $shopProduct = ShopProduct::create($data);
        return redirect()->route('ProductManagement.ShopProducts.index');
    }

    public function show(ShopProduct $shopProduct)
    {
        $shopProduct->load('hasShopProductInventory', 'hasLED');
        return view('product-management.on-sell.shop-products.show', compact('shopProduct'));
    }

    public function edit(ShopProduct $shopProduct)
    {
        $products = Product::all();
        return view('product-management.on-sell.shop-products.edit', compact('shopProduct', 'products'));
    }

    public function update(Request $request, ShopProduct $shopProduct)
    {
        $messages = [
            'qrcode.regex' => 'The qrcode format should start with "PRODUCT-"',
        ];

        $request->validate([
            'product_id'    => 'required',
            'qrcode'        => 'required|regex:((PRODUCT-)([a-zA-Z0-9]){1,})|unique:shop_products',
        ], $messages);

        $data = $request->all();
        $shopProduct->update($data);
        return redirect()->route('ProductManagement.ShopProducts.index');
    }

    public function destroy(ShopProduct $shopProduct)
    {
        $shopProduct->delete();
        return back();
    }

    public function massDestroy(MassDestroyShopProductRequest $request)
    {
        ShopProduct::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
