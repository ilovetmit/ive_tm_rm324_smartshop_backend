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
        $insurance = Insurance::create($request->all());
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
        $insurance->update($request->all());
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
