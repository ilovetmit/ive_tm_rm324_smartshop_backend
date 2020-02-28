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
        return view('TransactionManagement.Transaction.index', compact('transactions'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Transaction $transaction)
    {
        
    }

    public function edit(Transaction $transaction)
    {
        
    }

    public function update(Request $request, Transaction $transaction)
    {
        
    }

    public function destroy(Transaction $transaction)
    {
        
    }
}
