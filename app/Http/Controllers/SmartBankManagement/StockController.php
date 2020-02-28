<?php

namespace App\Http\Controllers\SmartBankManagement;

use App\Models\SmartBankManagement\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view('SmartBankManagement.Stock.index', compact('stocks'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Stock $stock)
    {
        
    }

    public function edit(Stock $stock)
    {
        
    }

    public function update(Request $request, Stock $stock)
    {
        
    }

    public function destroy(Stock $stock)
    {
        
    }
}
