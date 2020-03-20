<?php

namespace App\Http\Controllers\InformationManagement;

use App\Models\InformationManagement\Device;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyDeviceRequest;
use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use Symfony\Component\HttpFoundation\Response;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        return view('information-management.devices.index', compact('devices'));
    }

    public function create()
    {
        $users = User::all();
        return view('information-management.devices.create', compact('users'));
    }

    public function store(Request $request)
    {
        $device = Device::create($request->all());
        // $device->permissions()->sync($request->input('permissions', []));
        return redirect()->route('InformationManagement.Devices.index'); 
    }

    public function show(Device $device)
    {
        $device->load('hasUser');
        return view('information-management.devices.show', compact('device'));
    }

    public function edit(Device $device)
    {
        $users = User::all();
        // $device->load('hasUser');
        return view('information-management.devices.edit', compact('device', 'users'));
    }

    public function update(Request $request, Device $device)
    {
        $device->update($request->all());
        // $device->hasUser()->sync($request->input('hasUser', []));
        return redirect()->route('InformationManagement.Devices.index');
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return back();
    }
    
    public function massDestroy(MassDestroyDeviceRequest $request)
    {
        Device::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
