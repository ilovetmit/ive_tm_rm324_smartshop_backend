<?php

namespace App\Http\Controllers\TransactionManagement;

use App\Models\TransactionManagement\LockerTransaction;
use App\Models\TransactionManagement\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LockerManagement\Locker;
use App\Models\UserManagement\User;

class LockerTransactionController extends Controller
{
    public function index()
    {
        $lockerTransactions = LockerTransaction::all();
        return view('transaction-management.locker-transactions.index', compact('lockerTransactions'));
    }

    public function create()
    {
        $users = User::all();
        $lockers = Locker::all();
        $transactions = Transaction::all();
        return view('transaction-management.locker-transactions.create', compact('users', 'lockers', 'transactions'));
    }

    public function store(Request $request)
    {
        $lockerTransaction = LockerTransaction::create($request->all());
        $lockerTransaction->hasTransaction()->sync($request->input('hasTransaction', []));
        return redirect()->route('TransactionManagement.LockerTransactions.index');
    }

    public function show(LockerTransaction $lockerTransaction)
    {
        $lockerTransaction->load('hasTransaction');
        return view('transaction-management.locker-transactions.show', compact('lockerTransaction'));
    }

    public function edit(LockerTransaction $lockerTransaction)
    {
        $users = User::all();
        $lockers = Locker::all();
        $transactions = Transaction::all();        
        return view('transaction-management.locker-transactions.edit', compact('lockerTransaction', 'users', 'lockers', 'transactions'));
    }

    public function update(Request $request, LockerTransaction $lockerTransaction)
    {
        $lockerTransaction->update($request->all());
        // $lockerTransaction->hasPermission()->sync($request->input('permissions', []));
        return redirect()->route('TransactionManagement.LockerTransactions.index');
    }

    public function destroy(LockerTransaction $lockerTransaction)
    {
        $lockerTransaction->delete();
        return back();
    }
}
