<?php

namespace App\Http\Controllers\TransactionManagement;

use App\Models\TransactionManagement\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction-management.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $transaction = Transaction::all()->pluck('id');
        return view('transaction-management.transactions.create');
    }

    public function store(Request $request)
    {
        $transaction = Transaction::create($request->all());
        // $transaction->permissions()->sync($request->input('permissions', []));
        return redirect()->route('TransactionManagement.Transactions.index');
    }

    public function show(Transaction $transaction)
    {
        // $role->load('hasUser', 'hasPermission');
        return view('transaction-management.transactions.show');
    }

    public function edit(Transaction $transaction)
    {
        // $permissions = Permission::all()->pluck('name', 'id');
        // $transaction->load('hasPermission');
        return view('transaction-management.transactions.edit');
    }

    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->all());
        // $transaction->hasPermission()->sync($request->input('permissions', []));
        return redirect()->route('TransactionManagement.Transactions.index');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return back();
    }
}
