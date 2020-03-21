<?php

namespace App\Http\Controllers\TransactionManagement;

use App\Models\TransactionManagement\Transaction;
use App\Models\UserManagement\User;
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
        $users = User::all();
        return view('transaction-management.transactions.create', compact('users'));
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
        return view('transaction-management.transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        // $permissions = Permission::all()->pluck('name', 'id');
        // $transaction->load('hasPermission');
        $users = User::all();
        return view('transaction-management.transactions.edit', compact('transaction', 'users'));
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
