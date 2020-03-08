<?php

namespace App\Http\Controllers\InformationManagement;

use App\Models\InformationManagement\Vitcoin;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyVitcoinRequest;
use App\Http\Requests\StoreVitcoinRequest;
use App\Http\Requests\UpdateVitcoinRequest;
use Symfony\Component\HttpFoundation\Response;


class VitcoinController extends Controller
{
    public function index()
    {
        $vitcoins = Vitcoin::all();
        return view('information-management.vitcoins.index', compact('vitcoins'));
    }

    public function create()
    {
        $users = User::all()->pluck('id');
        return view('information-management.vitcoins.create', compact('users'));
    }

    public function store(Request $request)
    {
        $vitcoin = Vitcoin::create($request->all());
        // $vitcoin->hasUser()->sync($request->input('user_id', []));
        return redirect()->route('InformationManagement.Vitcoins.index');
    }

    public function show(Vitcoin $vitcoin)
    {
        $vitcoin->load('hasUser');
        return view('information-management.vitcoins.show', compact('vitcoin'));
    }

    public function edit(Vitcoin $vitcoin)
    {
        $users = User::all()->pluck('name', 'id');
        $vitcoin->load('hasUser');
        return view('information-management.vitcoins.edit', compact('users', 'vitcoin'));
    }

    public function update(Request $request, Vitcoin $vitcoin)
    {
        $vitcoin->update($request->all());
        // $vitcoin->hasUser()->sync($request->input('hasUser', []));
        return redirect()->route('InformationManagement.Vitcoins.index');
    }

    public function destroy(Vitcoin $vitcoin)
    {
        $vitcoin->delete();
        return back();
    }
    
    public function massDestroy(MassDestroyVitcoinRequest $request)
    {
        Vitcoin::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
