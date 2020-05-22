<?php

namespace App\Http\Controllers\Api\v1\SmartBank;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\SmartBank\InsuranceResource;
use App\Models\SmartBankManagement\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends ApiController
{
    public function getAllInsurance()
    {
        try {
            $insurance = Insurance::all();
            return parent::sendResponse('data', $insurance, 'All Insurance Data');
        } catch (\Exception $e) {
            return parent::sendError('all insurance.', 216);
        }
    }

    public function insurance_detail($id)
    {
        try {
            $insurance = Insurance::find($id);
            if ($insurance) {
                return parent::sendResponse('data', $insurance, 'Insurances Detail Data');
            } else {
                return parent::sendError('Product information expired', 216);
            }
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }
}
