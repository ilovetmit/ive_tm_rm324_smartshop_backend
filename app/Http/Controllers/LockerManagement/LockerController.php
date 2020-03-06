<?php

namespace App\Http\Controllers\LockerManagement;

use App\Models\LockerManagement\Locker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransactionManagement\LockerTransaction;

class LockerController extends Controller
{
    public function index()
    {
        $lockers = Locker::all();
        return view('locker-management.lockers.index', compact('lockers'));
    }

    public function create()
    {
        $lockers = Locker::all()->pluck('id');
        return view('locker-management.lockers.create', compact('lockers'));
    }

    public function store(Request $request)
    {
        $locker = Locker::create($request->all());
        // $user->roles()->sync($request->input('roles', []));
        return redirect()->route('LockerManagement.Lockers.index');
    }

    public function show(Locker $locker)
    {
        $locker->load('hasLockerTransaction');
        return view('locker-management.lockers.show', compact('locker'));
    }

    public function edit(Locker $locker)
    {
        $lockTransaction = LockerTransaction::all()->pluck('id');
        $locker->load('hasLockerTransaction');
        return view('locker-management.lockers.edit', compact('locker'));
    }

    public function update(Request $request, Locker $locker)
    {
        $locker->update($request->all());
        // $locker->hasLockerTransaction()->sync($request->input('locker_id', []));
        return redirect()->route('LockerManagement.Lockers.index');
    }

    public function destroy(Locker $locker)
    {
        $locker->delete();
        return back();
    }

    // public function massDestroy(MassDestroyUserRequest $request)
    // {
    //     User::whereIn('id', request('ids'))->delete();
    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
