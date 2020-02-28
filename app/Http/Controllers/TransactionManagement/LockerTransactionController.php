<?php

namespace App\Http\Controllers\TransactionManagement;

use App\Models\TransactionManagement\LockerTransaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LockerTransactionController extends Controller
{
    public function index()
    {
        $lockerTransactions = LockerTransaction::all();
        return view('TransactionManagement.LockerTransaction.index', compact('lockerTransactions'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(LockerTransaction $lockerTransaction)
    {
        
    }

    public function edit(LockerTransaction $lockerTransaction)
    {
        
    }

    public function update(Request $request, LockerTransaction $lockerTransaction)
    {
        
    }

    public function destroy(LockerTransaction $lockerTransaction)
    {
        
    }
}
