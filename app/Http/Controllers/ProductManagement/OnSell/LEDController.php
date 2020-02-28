<?php

namespace App\Http\Controllers\ProductManagement\OnSell;

use App\Models\ProductManagement\OnSell\LED;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LEDController extends Controller
{
    public function index()
    {
        $leds = LED::all();
        return view('ProductManagement.OnSell.Lockers.index', compact('leds'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(LED $lED)
    {
        
    }

    public function edit(LED $lED)
    {
        
    }

    public function update(Request $request, LED $lED)
    {
        
    }

    public function destroy(LED $lED)
    {
        
    }
}
