<?php

namespace App\Http\Controllers\TransactionManagement;

use App\Models\TransactionManagement\ProductTransaction;
use App\Models\TransactionManagement\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductTransactionController extends Controller
{
    public function index()
    {
        $productTransactions = ProductTransaction::all();
        return view('TransactionManagement.ProductTransactions.index', compact('productTransactions'));
    }

    public function create()
    {
        return view('TransactionManagement.ProductTransactions.create');
    }

    public function store(Request $request)
    {
        $productTransaction = ProductTransaction::create($request->all());
        $productTransaction->hasTransaction()->sync($request->input('hasTransaction', []));
        return redirect()->route('TransactionManagement.ProductTransactions.index');
    }

    public function show(ProductTransaction $productTransaction)
    {
        $productTransaction->load('hasTransaction');
        return view('TransactionManagement.ProductTransactions.show', compact('productTransaction'));
    }

    public function edit(ProductTransaction $productTransaction)
    {
        $transactions = Transaction::all()->pluck('id');
        $productTransaction->load('hasTransaction');
        return view('TransactionManagement.ProductTransactions.edit', compact('transactions', 'productTransaction'));
    }

    public function update(Request $request, ProductTransaction $productTransaction)
    {
        $productTransaction->update($request->all());
        // $productTransaction->hasPermission()->sync($request->input('permissions', []));
        return redirect()->route('TransactionManagement.ProductTransactions.index');
    }

    public function destroy(ProductTransaction $productTransaction)
    {
        $productTransaction->delete();
        return back();
    }
}
