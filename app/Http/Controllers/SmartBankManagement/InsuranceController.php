<?php

namespace App\Http\Controllers\SmartBankManagement;

use App\Models\SmartBankManagement\Insurance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InsuranceController extends Controller
{
    public function index()
    {
        $insurances = Insurance::all();
        return view('SmartBankManagement.Insurances.index', compact('insurances'));
    }

    public function create()
    {
        return view('SmartBankManagement.Insurances.create');
    }

    public function store(Request $request)
    {
        $insurance = Insurance::create($request->all());
        return redirect()->route('SmartBankManagement.Insurances.index');
    }
    
    public function show(Insurance $insurance)
    {
        return view('SmartBankManagement.Insurances.show', compact('insurance'));
    }
    
    public function edit(Insurance $insurance)
    {
        return view('SmartBankManagement.Insurances.edit', compact('insurance'));
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
}
