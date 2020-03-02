<?php

namespace App\Http\Controllers\InformationManagement;

use App\Models\InformationManagement\Interest;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterestController extends Controller
{
    public function index()
    {
        $interests = Interest::all();
        return view('InformationManagement.Interests.index', compact('interests'));
    }

    public function create()
    {
        $users = User::all()->pluck('id');
        return view('InformationManagement.Interests.create', compact('users'));
    }

    public function store(Request $request)
    {
        $interest = Interest::create($request->all());
        // $interest->hasUser()->sync($request->input('hasUser', []));
        return redirect()->route('InformationManagement.Interests.index');
    }

    public function show(Interest $interest)
    {
        $interest->load('hasUser');
        return view('InformationManagement.Interests.show', compact('interest'));
    }

    public function edit(Interest $interest)
    {
        $users = User::all()->pluck('id');
        $interest->load('hasUser');
        return view('InformationManagement.Interests.edit', compact('interest', 'users'));
    }

    public function update(Request $request, Interest $interest)
    {
        $interest->update($request->all());
        // $interest->hasUser()->sync($request->input('hasUser', []));
        return redirect()->route('InformationManagement.Interests.index');
    }
    
    public function destroy(Interest $interest)
    {
        $interest->delete();
        return back();
    }
}
