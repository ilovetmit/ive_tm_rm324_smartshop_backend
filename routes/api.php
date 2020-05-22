<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    Route::prefix('auth')->group(function () {
        Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
        Route::post('login', 'Api\v1\AuthController@login');
        Route::post('register', 'Api\v1\AuthController@register');
        Route::post('refresh', 'Api\v1\AuthController@register');
        Route::post('logout', 'Api\v1\AuthController@logout');
    });

    Route::post('face', 'Api\v1\FaceController@face_scan');
    Route::post('rfid_scan', 'Api\v1\RFIDController@rfid_scan');
    Route::post('object_detection', 'Api\v1\ObjectDetectionController@object_list');
    Route::post('checkout', 'Api\v1\ProductCheckoutController@checkout');

    // Route::group(['middleware' => 'auth:api',], function () {
    Route::get('logout', 'Api\v1\AuthController@logout');
    // Route::get('user', 'Api\v1\AuthController@user');

    //Api Check Password (before purchase)
    Route::post('check_password', 'Api\v1\AuthController@check_password');

    //Api  Product
    Route::get('products', 'Api\v1\Product\ProductController@product_list');
    Route::get('products/{id}', 'Api\v1\Product\ProductController@product_detail');

    // API Locker
    Route::get('lockers', 'Api\v1\Locker\LockerController@index');
    Route::get('locker/using', 'Api\v1\Locker\LockerController@locker_using');
    Route::get('locker/take_list', 'Api\v1\Locker\LockerController@take_list');
    Route::get('locker/take/open/{id}', 'Api\v1\Locker\LockerController@take_open');
    // Route::get('locker/open/{id}', 'Api\v1\Locker\LockerController@open');
    Route::post('locker/order', 'Api\v1\Locker\LockerController@create_order');

    //Vending Product
    Route::get('vending', 'Api\v1\Product\VendingProductController@vending_list');

    // Api User  Profile
    Route::get('index', 'Api\v1\User\UserController@get_pofile');
    Route::post('update', 'Api\v1\User\UserController@update');
    Route::post('update_avatar', 'Api\v1\User\UserController@update_avatar');
    Route::post('update_password', 'Api\v1\User\UserController@update_password');
    // });
    //Api Auth
    Route::post('login', 'Api\v1\AuthController@login');
    Route::post('register', 'Api\v1\AuthController@register');



    //Api Advertisment
    Route::get('advertisement', 'Api\v1\Advertisement\AdvertisementController@advertisement');
});


// test getAllinformation
// api/test/
Route::prefix('test')->group(function () {
    //     Route::get('advertisement',             'Api\v1\Advertisement\AdvertisementController@getAll');
    Route::get('address', 'Api\v1\Information\AddressController@getAll');
    //     Route::get('bankaccount',               'Api\v1\Information\BankAccountController@getAll');
    //     Route::get('device',                    'Api\v1\Information\DeviceController@getAll');
    //     Route::get('interest',                  'Api\v1\Information\InterestController@getAll');
    //     Route::get('vitcoin',                   'Api\v1\Information\VitcoinController@getAll');
    //     Route::get('locker',                    'Api\v1\Locker\LockerController@getAll');
    //     Route::get('category',                  'Api\v1\Product\CategoryController@getAll');
    //     Route::get('led',                       'Api\v1\Product\LEDController@getAll');
    //     Route::get('product',                   'Api\v1\Product\ProductController@getAll');
    //     Route::get('shopproduct',               'Api\v1\Product\ShopProductController@getAll');
    //     Route::get('shopproductinventory',      'Api\v1\Product\ShopProductInventoryController@getAll');
    //     Route::get('vendingproduct',            'Api\v1\Product\VendingProductController@getAll');
    //     Route::get('insurance',                 'Api\v1\SmartBank\InsuranceController@getAll');
    //     Route::get('stock',                     'Api\v1\SmartBank\StockController@getAll');
    //     Route::get('tag',                       'Api\v1\Tag\TagController@getAll');
    //     Route::get('lockertransaction',         'Api\v1\Transaction\LockerTransactionController@getAll');
    //     Route::get('producttransaction',        'Api\v1\Transaction\ProductTransactionController@getAll');
    //     Route::get('remittancetransaction',     'Api\v1\Transaction\RemittanceTransactionController@getAll');
    //     Route::get('transaction',               'Api\v1\Transaction\TransactionController@getAll');
    //     Route::get('user',                      'Api\v1\User\UserController@getAll');
});
