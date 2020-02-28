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
        return view('SmartBankManagement.Insurance.index', compact('insurances'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }
    
    public function show(Insurance $insurance)
    {
        
    }
    
    public function edit(Insurance $insurance)
    {
        
    }
    
    public function update(Request $request, Insurance $insurance)
    {
        
    }
    
    public function destroy(Insurance $insurance)
    {
        
    }
}
