<?php

namespace App\Http\Controllers\ProductManagement\VendingMachine;

use App\Models\ProductManagement\VendingMachine\VendingProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendingProductController extends Controller
{
    public function index()
    {
        $vendingProducts = VendingProduct::all();
        return view('ProductManagement.VendingMachine.VendingProducts.index', compact('vendingProducts'));
    }

    public function create()
    {
        // $permissions = Permission::all()->pluck('name', 'id');
        return view('ProductManagement.VendingMachine.VendingProducts.create');
    }

    public function store(Request $request)
    {
        $vendingProduct = VendingProduct::create($request->all());
        // $remittanceTransaction->hasTransaction()->sync($request->input('hasTransaction', []));
        return redirect()->route('ProductManagement.VendingProducts.index');
    }

    public function show(VendingProduct $vendingProduct)
    {
        // $product->load('hasTransaction');
        return view('ProductManagement.VendingMachine.VendingProducts.show', compact('vendingProduct'));
    }

    public function edit(VendingProduct $vendingProduct)
    {
        // $transactions = Transaction::all()->pluck('id');
        // $product->load('hasTransaction');
        return view('ProductManagement.VendingMachine.VendingProducts.edit', compact('vendingProduct'));
    }

    public function update(Request $request, VendingProduct $vendingProduct)
    {
        $vendingProduct->update($request->all());
        // $remittanceTransaction->hasPermission()->sync($request->input('permissions', []));
        return redirect()->route('ProductManagement.VendingProducts.index');
    }

    public function destroy(VendingProduct $vendingProduct)
    {
        $vendingProduct->delete();
        return back();
    }
}
