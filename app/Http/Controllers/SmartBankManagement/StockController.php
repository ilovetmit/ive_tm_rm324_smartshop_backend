<?php

namespace App\Http\Controllers\SmartBankManagement;

use App\Models\SmartBankManagement\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyStockRequest;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use Symfony\Component\HttpFoundation\Response;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view('smart-bank-management.stocks.index', compact('stocks'));
    }

    public function create()
    {
        return view('smart-bank-management.stocks.create');
    }

    public function store(Request $request)
    {
        $stock = Stock::create($request->all());
        return redirect()->route('SmartBankManagement.Stocks.index');
    }

    public function show(Stock $stock)
    {
        return view('smart-bank-management.stocks.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        return view('smart-bank-management.stocks.edit', compact('stock'));
    }

    public function update(Request $request, Stock $stock)
    {
        $stock->update($request->all());
        return redirect()->route('SmartBankManagement.Stocks.index');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return back();
    }
    
    public function massDestroy(MassDestroyStockRequest $request)
    {
        Stock::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
