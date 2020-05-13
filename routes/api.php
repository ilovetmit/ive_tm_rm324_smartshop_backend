<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    //todo Route group
    Route::post('face', 'Api\v1\FaceController@face_scan');
    Route::post('rfid_scan', 'Api\v1\RFIDController@rfid_scan');
    Route::post('checkout', 'Api\v1\ProductCheckoutController@checkout');
});
