<?php

namespace App\Http\Controllers\ProductManagement\OnSell;

use App\Models\ProductManagement\OnSell\LED;
use App\Models\ProductManagement\OnSell\ShopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyLEDRequest;
use App\Http\Requests\StoreLEDRequest;
use App\Http\Requests\UpdateLEDRequest;
use Symfony\Component\HttpFoundation\Response;


class LEDController extends Controller
{
    public function index()
    {
        $leds = LED::all();
        return view('product-management.on-sell.leds.index', compact('leds'));
    }

    public function create()
    {
        $shopProducts = ShopProduct::all();
        return view('product-management.on-sell.leds.create', compact('shopProducts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shop_product_id'   => 'required',
        ]);
        $led = LED::create($request->all());
        return redirect()->route('ProductManagement.LEDs.index');
    }

    public function show(LED $led)
    {
        $led->load('hasShopProduct');
        return view('product-management.on-sell.leds.show', compact('led'));
    }

    public function edit(LED $led)
    {
        $shopProducts = ShopProduct::all();
        return view('product-management.on-sell.leds.edit', compact('led', 'shopProducts'));
    }

    public function update(Request $request, LED $led)
    {
        $request->validate([
            'shop_product_id'   => 'required',
        ]);
        $led->update($request->all());
        return redirect()->route('ProductManagement.LEDs.index');
    }

    public function destroy(LED $led)
    {
        $led->delete();
        return back();
    }

    public function massDestroy(MassDestroyLEDRequest $request)
    {
        LED::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
