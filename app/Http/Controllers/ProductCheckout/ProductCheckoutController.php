<?php

namespace App\Http\Controllers\ProductCheckout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ProductCheckoutController extends Controller
{
    public function index()
    {
        return view('user-panel.product-checkout.index');
    }

    public function checkout_temp(Request $request)
    {
        $token = Str::random('64');
        $product_list = json_decode($request->product_list);
        Cache::tags('checkout')->put($token, $product_list, 130); //more 10s
        $response = [
            'data' => $token,
            'message' => 'Cache Put',
        ];
        return response()->json($response, 200);
    }
}
