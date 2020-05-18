<?php

namespace App\Http\Controllers\InformationManagement;

use App\Models\InformationManagement\Vitcoin;
use App\Http\Controllers\Controller;


class VitcoinController extends Controller
{
    public function index()
    {
        $vitcoins = Vitcoin::all();

        $vitcoins->load('user');

        return view('information-management.vitcoins.index', compact('vitcoins'));
    }
}
