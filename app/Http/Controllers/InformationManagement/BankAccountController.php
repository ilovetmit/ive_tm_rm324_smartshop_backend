<?php

namespace App\Http\Controllers\InformationManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformationManagement\BankAccount;
use App\Models\UserManagement\User;
// massDestroy
use App\Http\Requests\MassDestroyBankAccountRequest;
use App\Http\Requests\StoreBankAccountRequest;
use App\Http\Requests\UpdateBankAccountRequest;
use Symfony\Component\HttpFoundation\Response;

class BankAccountController extends Controller
{
    public function index()
    {
        $bankAccounts = BankAccount::all();
        return view('information-management.bank-accounts.index', compact('bankAccounts'));
    }

    public function create()
    {
        $users = User::all();
        return view('information-management.bank-accounts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'           => 'required|unique:bank_accounts',
            'current_account'   => 'required',
            'saving_account'    => 'required',
        ]);
        $bankaccounts = BankAccount::create($request->all());
        return redirect()->route('InformationManagement.BankAccounts.index');
    }

    public function show(BankAccount $bankAccount)
    {
        $bankAccount->load('hasUser');
        return view('information-management.bank-accounts.show', compact('bankAccount'));
    }

    public function edit(BankAccount $bankAccount)
    {
        $users = User::all();
        return view('information-management.bank-accounts.edit', compact('bankAccount', 'users'));
    }

    public function update(Request $request, BankAccount $bankAccount)
    {
        $request->validate([
            'user_id'           => 'required|unique:bank_accounts,user_id' . ($bankAccount->id ? ",$bankAccount->id" : ''),
            'current_account'   => 'required',
            'saving_account'    => 'required',
        ]);
        $bankAccount->update($request->all());
        return redirect()->route('InformationManagement.BankAccounts.index');
    }

    public function destroy(BankAccount $bankAccount)
    {
        $bankAccount->delete();
        return back();
    }

    public function massDestroy(MassDestroyBankAccountRequest $request)
    {
        BankAccount::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
