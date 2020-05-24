<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\Checkout;
use Illuminate\Http\Request;


class TestController extends ApiController {
    public function test(Request $request) {
        try {

//            event(new Checkout("REFRESH"));

            return parent::sendResponse('data', 'test', 'Test Success');
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }

}
