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
        $data = $request->all();
        if (isset($request->qrcode)) {
            $photoTypes = array('png', 'jpg', 'jpeg');
            $extension = $request->file('qrcode')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('qrcode')->store('public/shop_product/qrcode');
                $data['qrcode'] = basename($file);
            } else {
                return back()->withErrors('Create Fail, Image type error, only png, jpg, jpeg');
            }
        }
        $shopProduct = ShopProduct::create($data);
        return redirect()->route('ProductManagement.ShopProducts.index');
    }

    public function show(ShopProduct $shopProduct)
    {
        // $shopProduct->load('hasTransaction');
        return view('product-management.on-sell.shop-products.show', compact('shopProduct'));
    }

    public function edit(ShopProduct $shopProduct)
    {
        $products = Product::all();
        return view('product-management.on-sell.shop-products.edit', compact('shopProduct', 'products'));
    }

    public function update(Request $request, ShopProduct $shopProduct)
    {
        $data = $request->all();
        if (isset($request->qrcode)) {
            $photoTypes = array('png', 'jpg', 'jpeg');
            $extension = $request->file('qrcode')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('qrcode')->store('public/shop_product/qrcode');
                $data['qrcode'] = basename($file);
            } else {
                return back()->withErrors('Create Fail, Image type error, only png, jpg, jpeg');
            }
        }
        $user->update($data);
        $shopProduct->update($request->all());
        // $remittanceTransaction->hasPermission()->sync($request->input('permissions', []));
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
