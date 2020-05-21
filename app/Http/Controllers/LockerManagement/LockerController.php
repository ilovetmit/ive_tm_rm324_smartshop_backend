<?php

namespace App\Http\Controllers\LockerManagement;

use App\Models\LockerManagement\Locker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransactionManagement\LockerTransaction;
// massDestroy
use App\Http\Requests\MassDestroyLockerRequest;
use App\Http\Requests\StoreLockerRequest;
use App\Http\Requests\UpdateLockerRequest;
use Symfony\Component\HttpFoundation\Response;


class LockerController extends Controller
{
    public function index()
    {
        $lockers = Locker::all();
        return view('locker-management.lockers.index', compact('lockers'));
    }

    public function create()
    {
        return view('locker-management.lockers.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'qrcode.regex' => 'The qrcode format should start with "LOCKER-"',
        ];

        $request->validate([
            'qrcode'            => 'required|regex:((LOCKER-)([a-zA-Z0-9]){1,})|unique:lockers',
            'per_hour_price'    => 'required|integer',
            'is_active'         => 'required',
            'is_using'          => 'required',
        ], $messages);

        $data = $request->all();
        $locker = Locker::create($data);
        return redirect()->route('LockerManagement.Lockers.index');
    }

    public function show(Locker $locker)
    {
        $locker->load('hasLockerTransaction');
        return view('locker-management.lockers.show', compact('locker'));
    }

    public function edit(Locker $locker)
    {
        return view('locker-management.lockers.edit', compact('locker'));
    }

    public function update(Request $request, Locker $locker)
    {
        $messages = [
            'qrcode.regex' => 'The qrcode format should start with "LOCKER-"',
        ];

        $request->validate([
            'qrcode'            => 'required|regex:((LOCKER-)([a-zA-Z0-9]){1,})|unique:lockers,qrcode' . ($locker->id ? ",$locker->id" : ''),
            'per_hour_price'    => 'required|integer',
            'is_active'         => 'required',
            'is_using'          => 'required',
        ], $messages);
        
        $data = $request->all();
        $locker->update($data);
        return redirect()->route('LockerManagement.Lockers.index');
    }

    public function destroy(Locker $locker)
    {
        $locker->delete();
        return back();
    }

    public function massDestroy(MassDestroyLockerRequest $request)
    {
        Locker::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
