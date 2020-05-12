<?php

namespace App\Http\Controllers\ProductCheckout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCheckoutController extends Controller
{
    public function index()
    {
        return view('product-checkout.index');
    }
}
