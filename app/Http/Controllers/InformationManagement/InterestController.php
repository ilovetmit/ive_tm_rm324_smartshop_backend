<?php

namespace App\Http\Controllers\InformationManagement;

use App\Models\InformationManagement\Interest;
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
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Interest $interest)
    {
        $interest->load('user');
        return view('InformationManagement.Interest.show', compact('interest'));
    }

    public function edit(Interest $interest)
    {
        
    }

    public function update(Request $request, Interest $interest)
    {
        
    }
    
    public function destroy(Interest $interest)
    {
        
    }
}
