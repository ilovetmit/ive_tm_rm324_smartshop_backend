<?php

namespace App\Http\Controllers\InformationManagement;

use App\Models\InformationManagement\Interest;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyInterestRequest;
use App\Http\Requests\StoreInterestRequest;
use App\Http\Requests\UpdateInterestRequest;
use Symfony\Component\HttpFoundation\Response;


class InterestController extends Controller
{
    public function index()
    {
        $interests = Interest::all();
        return view('information-management.interests.index', compact('interests'));
    }

    public function create()
    {
        $users = User::all()->pluck('id');
        return view('information-management.interests.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|unique:interests',
            'description'    => 'nullable|string',
        ]);
        $interest = Interest::create($request->all());
        // $interest->hasUser()->sync($request->input('hasUser', []));
        return redirect()->route('InformationManagement.Interests.index');
    }

    public function show(Interest $interest)
    {
        $interest->load('hasUser');
        return view('information-management.interests.show', compact('interest'));
    }

    public function edit(Interest $interest)
    {
        $users = User::all()->pluck('id');
        $interest->load('hasUser');
        return view('information-management.interests.edit', compact('interest', 'users'));
    }

    public function update(Request $request, Interest $interest)
    {
        $request->validate([
            'name'           => 'required|string|unique:interests,name' . ($interest->id ? ",$interest->id" : ''),
            'description'    => 'nullable|string',
        ]);
        $interest->update($request->all());
        // $interest->hasUser()->sync($request->input('hasUser', []));
        return redirect()->route('InformationManagement.Interests.index');
    }

    public function destroy(Interest $interest)
    {
        $interest->delete();
        return back();
    }

    public function massDestroy(MassDestroyInterestRequest $request)
    {
        Interest::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
