<?php

namespace App\Http\Controllers\InformationManagement;

use App\Models\InformationManagement\Vitcoin;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyVitcoinRequest;
use App\Http\Requests\StoreInterestRequest;
use App\Http\Requests\UpdateInterestRequest;
use Symfony\Component\HttpFoundation\Response;

class VitcoinController extends Controller
{
    public function index()
    {
        $vitcoins = Vitcoin::all();
        $vitcoins->load('hasUser');
        return view('information-management.vitcoins.index', compact('vitcoins'));
    }

    public function create()
    {
        // $vitcoins = Vitcoin::all();
        $users = User::all();
        return view('information-management.vitcoins.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'       => 'required',
            'address'       => 'required|unique:vitcoins',
            'primary_key'   => 'required',
        ]);
        Vitcoin::create($request->all());
        return redirect()->route('InformationManagement.Vitcoins.index'); 
    }

    public function show(Vitcoin $vitcoin)
    {
        $vitcoin->load('hasUser');
        return view('information-management.vitcoins.show', compact('vitcoin'));
    }

    public function edit(Vitcoin $vitcoin)
    {
        $users = User::all();
        return view('information-management.vitcoins.edit', compact('vitcoin', 'users'));
    }

    public function update(Request $request, Vitcoin $vitcoin)
    {
        $request->validate([
            'user_id'       => 'required',
            'address'       => 'required|unique:vitcoins,address' . ($vitcoin->id ? ",$vitcoin->id" : ''),
            'primary_key'   => 'required',
        ]);
        $vitcoin->update($request->all());
        return redirect()->route('InformationManagement.Vitcoins.index');
    }

    public function destroy(Vitcoin $vitcoin)
    {
        $vitcoin->delete();
        return back();
    }


    public function massDestroy(MassDestroyVitcoinRequest $request)
    {

    }
}
