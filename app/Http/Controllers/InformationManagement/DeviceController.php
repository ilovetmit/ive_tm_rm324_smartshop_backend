<?php

namespace App\Http\Controllers\InformationManagement;

use App\Models\InformationManagement\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        return view('InformationManagement.Devices.index', compact('devices'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Device $device)
    {
        $device->load('user');
        return view('InformationManagement.Devices.show', compact('device'));
    }

    public function edit(Device $device)
    {
        
    }

    public function update(Request $request, Device $device)
    {
        
    }

    public function destroy(Device $device)
    {
        
    }
}
