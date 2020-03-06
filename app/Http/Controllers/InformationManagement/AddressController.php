<?php

namespace App\Http\Controllers\InformationManagement;

use App\Models\InformationManagement\Address;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();
        return view('information-management.addresses.index', compact('addresses'));
    }

    public function create()
    {
        return view('information-management.addresses.create');
    }

    public function store(Request $request)
    {
        $addresses = Address::create($request->all());
        return redirect()->route('InformationManagement.Addresses.index');
    }

    public function show(Address $address)
    {
        $address->load('hasUser');
        return view('information-management.addresses.show', compact('address'));
    }

    public function edit(Address $address)
    {
        $users = User::all()->pluck('name', 'id');
        $address->load('hasUser');
        return view('information-management.addresses.edit', compact('address', 'users'));
    }

    public function update(Request $request, Address $address)
    {
        $address->update($request->all());
        // $address->hasUser()->sync($request->input('user', []));
        return redirect()->route('InformationManagement.Addresses.index');
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return back();
    }
}
