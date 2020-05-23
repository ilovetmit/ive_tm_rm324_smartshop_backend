<?php

namespace App\Http\Controllers\SmartBankManagement;

use App\Models\SmartBankManagement\Insurance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyInsuranceRequest;
use App\Http\Requests\StoreInsuranceRequest;
use App\Http\Requests\UpdateInsuranceRequest;
use Symfony\Component\HttpFoundation\Response;

class InsuranceController extends Controller
{
    public function index()
    {
        $insurances = Insurance::all();
        return view('smart-bank-management.insurances.index', compact('insurances'));
    }

    public function create()
    {
        return view('smart-bank-management.insurances.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|unique:insurances',
            'image'         => 'required',
            'price'         => 'required',
            'description'   => 'nullable',
        ]);
        $data = $request->all();
        if (isset($request->image)) {
            $photoTypes = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
            $extension = $request->file('image')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('image')->store('public/insurances/image');
                $data['image'] = basename($file);
            } else {
                return back()->withErrors('Create Fail, Image type error, only png, jpg, jpeg');
            }
        }
        $insurance = Insurance::create($data);
        return redirect()->route('SmartBankManagement.Insurances.index');
    }
    
    public function show(Insurance $insurance)
    {
        return view('smart-bank-management.insurances.show', compact('insurance'));
    }
    
    public function edit(Insurance $insurance)
    {
        return view('smart-bank-management.insurances.edit', compact('insurance'));
    }
    
    public function update(Request $request, Insurance $insurance)
    {
        $request->validate([
            'name'          => 'required|unique:insurances,name' . ($insurance->id ? ",$insurance->id" : ''),
            'image'         => 'required',
            'price'         => 'required',
            'description'   => 'nullable',
        ]);
        $data = $request->all();
        if (isset($request->image)) {
            $photoTypes = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
            $extension = $request->file('image')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('image')->store('public/insurances/image');
                $data['image'] = basename($file);
            } else {
                return back()->withErrors('Create Fail, Image type error, only png, jpg, jpeg');
            }
        }
        $insurance->update($data);
        return redirect()->route('SmartBankManagement.Insurances.index');
    }
    
    public function destroy(Insurance $insurance)
    {
        $insurance->delete();
        return back();
    }
    
    public function massDestroy(MassDestroyInsuranceRequest $request)
    {
        Insurance::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
