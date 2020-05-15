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
    Route::post('face', 'Api\v1\FaceController@face_scan');
});

Route::prefix('v1')->group(function () {
    Route::post('login',                    'Api\v1\User\UserController@login');
    Route::get('advertisement',             'Api\v1\Advertisement\AdvertisementController@getAll');
    Route::get('address',                   'Api\v1\Information\AddressController@getAll');
    Route::get('bankaccount',               'Api\v1\Information\BankAccountController@getAll');
    Route::get('device',                    'Api\v1\Information\DeviceController@getAll');
    Route::get('interest',                  'Api\v1\Information\InterestController@getAll');
    Route::get('vitcoin',                   'Api\v1\Information\VitcoinController@getAll');
    Route::get('locker',                    'Api\v1\Locker\LockerController@getAll');
    Route::get('category',                  'Api\v1\Product\CategoryController@getAll');
    Route::get('led',                       'Api\v1\Product\LEDController@getAll');
    Route::get('product',                   'Api\v1\Product\ProductController@getAll');
    Route::get('shopproduct',               'Api\v1\Product\ShopProductController@getAll');
    Route::get('shopproductinventory',      'Api\v1\Product\ShopProductInventoryController@getAll');
    Route::get('vendingproduct',            'Api\v1\Product\VendingProductController@getAll');
    Route::get('insurance',                 'Api\v1\SmartBank\InsuranceController@getAll');
    Route::get('stock',                     'Api\v1\SmartBank\StockController@getAll');
    Route::get('tag',                       'Api\v1\Tag\TagController@getAll');
    Route::get('lockertransaction',         'Api\v1\Transaction\LockerTransactionController@getAll');
    Route::get('producttransaction',        'Api\v1\Transaction\ProductTransactionController@getAll');
    Route::get('remittancetransaction',     'Api\v1\Transaction\RemittanceTransactionController@getAll');
    Route::get('transaction',               'Api\v1\Transaction\TransactionController@getAll');
    Route::get('user',                      'Api\v1\User\UserController@getAll');
});