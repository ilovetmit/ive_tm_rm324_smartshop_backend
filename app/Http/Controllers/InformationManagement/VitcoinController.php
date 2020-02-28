<?php

namespace App\Http\Controllers\InformationManagement;

use App\Models\InformationManagement\Vitcoin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VitcoinController extends Controller
{
    public function index()
    {
        $vitcoins = Vitcoin::all();
        return view('InformationManagement.Vitcoins.index', compact('vitcoins'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Vitcoin $vitcoin)
    {
        $vitcoin->load('user');
        return view('InformationManagement.Interest.show', compact('vitcoin'));
    }

    public function edit(Vitcoin $vitcoin)
    {
        
    }

    public function update(Request $request, Vitcoin $vitcoin)
    {
        
    }

    public function destroy(Vitcoin $vitcoin)
    {
        
    }
}
