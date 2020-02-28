<?php

namespace App\Http\Controllers\AdvertisementManagement;

use App\Models\AdvertisementManagement\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('AdvertisementManagement.Advertisements.index', compact('advertisements'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Advertisement $advertisement)
    {
        $advertisement->load('hasTag');
        return view('AdvertisementManagement.Advertisements.show', compact('advertisement'));
    }

    public function edit(Advertisement $Advertisement)
    {
        
    }

    public function update(Request $request, Advertisement $Advertisement)
    {
        
    }

    public function destroy(Advertisement $Advertisement)
    {
        
    }
}
