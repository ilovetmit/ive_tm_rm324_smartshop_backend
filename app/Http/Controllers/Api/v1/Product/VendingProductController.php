<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\VendingProductResource;
use App\Models\ProductManagement\VendingMachine\VendingProduct;
use Illuminate\Http\Request;

class VendingProductController extends ApiController
{
    public function vending_list()
    {
        try {
            $vending = VendingProduct::all();
            return parent::sendResponse('data', $vending, 'All Vending Product Data');
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }
}
