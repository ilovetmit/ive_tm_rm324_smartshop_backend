<?php

namespace App\Http\Controllers\Api\v1\SmartBank;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\SmartBank\StockResource;
use App\Models\SmartBankManagement\Stock;
use Illuminate\Http\Request;

class StockController extends ApiController
{
    public function getAllStock()
    {
        try {
            $stock = Stock::paginate(10);
            return parent::sendResponse('data', $stock, 'All Stock Data');
        } catch (\Exception $e) {
            return parent::sendError('all stock.', 216);
        }
    }

    public function stock_detail($id)
    {
        try {
            $stock = Stock::find($id);
            if ($stock) {
                return parent::sendResponse('data', $stock, 'Stock Detail Data');
            } else {
                return parent::sendError('Product information expired', 216);
            }
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }
}
