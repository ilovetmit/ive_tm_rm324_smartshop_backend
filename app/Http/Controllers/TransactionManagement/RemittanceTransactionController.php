<?php

namespace App\Http\Controllers\TransactionManagement;

use App\Models\TransactionManagement\RemittanceTransaction;
use App\Models\TransactionManagement\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RemittanceTransactionController extends Controller
{
    public function index()
    {
        $remittanceTransactions = RemittanceTransaction::all();
        return view('transaction-management.remittance-transactions.index', compact('remittanceTransactions'));
    }

    public function create()
    {
        // $permissions = Permission::all()->pluck('name', 'id');
        return view('transaction-management.remittance-transactions.create');
    }

    public function store(Request $request)
    {
        $remittanceTransaction = RemittanceTransaction::create($request->all());
        $remittanceTransaction->hasTransaction()->sync($request->input('hasTransaction', []));
        return redirect()->route('TransactionManagement.RemittanceTransactions.index');
    }

    public function show(RemittanceTransaction $remittanceTransaction)
    {
        $remittanceTransaction->load('hasTransaction');
        return view('transaction-management.remittance-transactions.show', compact('remittanceTransaction'));
    }

    public function edit(RemittanceTransaction $remittanceTransaction)
    {
        $transactions = Transaction::all()->pluck('id');
        $remittanceTransaction->load('hasTransaction');
        return view('transaction-management.remittance-transactions.edit', compact('transactions', 'remittanceTransaction'));
    }

    public function update(Request $request, RemittanceTransaction $remittanceTransaction)
    {
        $remittanceTransaction->update($request->all());
        // $remittanceTransaction->hasPermission()->sync($request->input('permissions', []));
        return redirect()->route('TransactionManagement.RemittanceTransactions.index');
    }

    public function destroy(RemittanceTransaction $remittanceTransaction)
    {
        $remittanceTransaction->delete();
        return back();
    }
}
