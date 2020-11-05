<?php

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
        // Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
        Route::post('login', 'Api\v1\AuthController@login');
        Route::post('register', 'Api\v1\AuthController@register');
        // Route::post('refresh', 'Api\v1\AuthController@refresh');
    });

    Route::group(['middleware' => 'auth:api',], function () {
        Route::get('wallet', 'Api\v1\VitcoinController@wallet');
        Route::get('createkeypairs', 'Api\v1\VitcoinController@createkeypairs');
        Route::post('vitcoin-mining', 'Api\v1\VitcoinController@mining');
        Route::post('fake-complete', 'Api\v1\VitcoinController@complete');   // test api

        Route::post('logout', 'Api\v1\AuthController@logout');

        Route::post('checkout', 'Api\v1\ProductCheckoutController@checkout');
        Route::post('checkout_transaction', 'Api\v1\ProductCheckoutController@checkout_transaction');
        // Route::get('user', 'Api\v1\AuthController@user');



        //Api  Product
        Route::get('products', 'Api\v1\Product\ProductController@products');
        Route::get('products/{id}', 'Api\v1\Product\ProductController@product_detail');

        //Api Product Transaction
        Route::get('orders', 'Api\v1\Transaction\ProductTransactionController@getOrderHistory');
        Route::post('orders', 'Api\v1\Transaction\ProductTransactionController@order_create');

        //Api Bank
        Route::get('bank', 'Api\v1\Information\BankAccountController@getBank');
        Route::post('banking_login', 'Api\v1\Information\BankAccountController@banking_login');
        //Api Bank(Transaction)
        Route::get('transaction', 'Api\v1\Transaction\TransactionController@getTransaction');
        //Api Bank(Stock)
        Route::get('stock', 'Api\v1\SmartBank\StockController@getAllStock');
        Route::get('stock/{id}', 'Api\v1\SmartBank\StockController@stock_detail');
        //Api Bank(Insurance)
        Route::get('insurance', 'Api\v1\SmartBank\InsuranceController@getAllInsurance');
        Route::get('insurance/{id}', 'Api\v1\SmartBank\InsuranceController@insurance_detail');
        //Api Bank(Transfer)
        Route::post('transfer', 'Api\v1\Transaction\TransactionController@transfer');


        // API Locker
        Route::get('locker', 'Api\v1\Locker\LockerController@index');
        Route::get('locker/free', 'Api\v1\Locker\LockerController@locker_free');
        Route::get('locker/take_list', 'Api\v1\Locker\LockerController@take_list');
        Route::get('locker/take/open/{id}', 'Api\v1\Locker\LockerController@take_open');
        // Route::get('locker/open/{id}', 'Api\v1\Locker\LockerController@open');
        Route::post('locker/order', 'Api\v1\Locker\LockerController@create_order');

        //Api Vending Product
        Route::get('vending', 'Api\v1\Product\VendingProductController@vending_list');
        Route::get('vending/{id}', 'Api\v1\Product\VendingProductController@vending_detail');
        Route::post('vending_buy', 'Api\v1\Product\VendingProductController@vending_buy');

        // Api User  Profile
        Route::get('profile', 'Api\v1\User\UserController@get_profile');
        Route::post('profile', 'Api\v1\User\UserController@update_profile');
        Route::post('update_avatar', 'Api\v1\User\UserController@update_avatar');
        Route::post('update_password', 'Api\v1\User\UserController@update_password');

        //Api User Address
        Route::get('address', 'Api\v1\Information\AddressController@getAddress');
        Route::get('address_list', 'Api\v1\Information\AddressController@getAddressList');
        Route::post('address', 'Api\v1\Information\AddressController@updateAddress');
        Route::delete('address/{id}', 'Api\v1\Information\AddressController@deleteAddress');

        //Api User List
        Route::get('user/list', 'Api\v1\User\UserController@user_list');
        // });

        //Api Auth
        Route::post('login', 'Api\v1\AuthController@login');
        // Route::post('register', 'Api\v1\AuthController@register');
        //Api Check Password (before purchase)
        Route::post('check_password', 'Api\v1\User\UserController@check_password');
    });

    //    Route::post('face', 'Api\v1\FaceController@face_scan');
    Route::post('rfid_scan', 'Api\v1\RFIDController@rfid_scan');
    Route::post('object_detection', 'Api\v1\ObjectDetectionController@object_list');

    //Api Advertisment
    Route::get('advertisement', 'Api\v1\Advertisement\AdvertisementController@advertisement');

    Route::get('test', 'Api\v1\TestController@test');

    // Demo User Login
    Route::get('user/list', 'Api\v1\User\UserController@user_list');
});

// v2 link for IoT device read -> old code design
Route::prefix('v2')->group(function () {
    /**
     * IoT API
     */
    Route::get('locker', 'Api\v2\IoTController@locker');
    Route::get('vending', 'Api\v2\IoTController@vending');
    Route::get('sensor', 'Api\v2\IoTController@sensor');
    Route::get('price', 'Api\v2\IoTController@price');
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
