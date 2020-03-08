<?php

namespace App\Http\Controllers\ProductManagement\OnSell;

use App\Models\ProductManagement\OnSell\LED;
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
        // $permissions = Permission::all()->pluck('name', 'id');
        return view('product-management.on-sell.leds.create');
    }

    public function store(Request $request)
    {
        $led = LED::create($request->all());
        // $remittanceTransaction->hasTransaction()->sync($request->input('hasTransaction', []));
        return redirect()->route('ProductManagement.LEDs.index');
    }

    public function show(LED $led)
    {
        // $led->load('hasTransaction');
        return view('product-management.on-sell.leds.show', compact('led'));
    }

    public function edit(LED $led)
    {
        // $transactions = Transaction::all()->pluck('id');
        // $led->load('hasTransaction');
        return view('product-management.on-sell.leds.edit', compact('led'));
    }

    public function update(Request $request, LED $led)
    {
        $led->update($request->all());
        // $remittanceTransaction->hasPermission()->sync($request->input('permissions', []));
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
