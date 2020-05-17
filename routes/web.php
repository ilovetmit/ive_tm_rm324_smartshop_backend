<?php

use JeroenNoten\LaravelAdminLte\AdminLte;

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
/***********************************************
 * Smart-Shop-FYP (admin side) Controller
 ***********************************************/
Route::group(['middleware' => ['auth']], function () {

    // http://127.0.0.1:8000/SmartShop
    Route::group(['prefix' => 'SmartShop'], function () {

        // http://127.0.0.1:8000/SmartShop/Dashboard
        Route::get('Dashboard', 'DashboardController@index')->name('Dashboard');

        Route::group(['prefix' => 'UserManagement', 'as' => 'UserManagement.', 'namespace' => 'UserManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/UserManagement/Permissions
            Route::delete('Permissions/destroy', 'PermissionController@massDestroy')->name('Permissions.massDestroy');
            Route::resource('Permissions', 'PermissionController');
            // http://127.0.0.1:8000/SmartShop/UserManagement/Roles
            Route::delete('Roles/destroy', 'RoleController@massDestroy')->name('Roles.massDestroy');
            Route::resource('Roles', 'RoleController');
            // http://127.0.0.1:8000/SmartShop/UserManagement/Users
            Route::delete('Users/destroy', 'UserController@massDestroy')->name('Users.massDestroy');
            Route::resource('Users', 'UserController');
        });

        Route::group(['prefix' => 'InformationManagement', 'as' => 'InformationManagement.', 'namespace' => 'InformationManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/InformationManagement/Addresses
            Route::delete('Addresses/destroy', 'AddressController@massDestroy')->name('Addresses.massDestroy');
            Route::resource('Addresses', 'AddressController');
            // http://127.0.0.1:8000/SmartShop/InformationManagement/BankAccounts
            Route::delete('BankAccounts/destroy', 'BankAccountController@massDestroy')->name('BankAccounts.massDestroy');
            Route::resource('BankAccounts', 'BankAccountController');
            // http://127.0.0.1:8000/SmartShop/InformationManagement/Devices
            Route::delete('Devices/destroy', 'DeviceController@massDestroy')->name('Devices.massDestroy');
            Route::resource('Devices', 'DeviceController');
            // http://127.0.0.1:8000/SmartShop/InformationManagement/Interests
            Route::delete('Interests/destroy', 'InterestController@massDestroy')->name('Interests.massDestroy');
            Route::resource('Interests', 'InterestController');
            // http://127.0.0.1:8000/SmartShop/InformationManagement/Vitcoins
            Route::delete('Vitcoins/destroy', 'VitcoinController@massDestroy')->name('Vitcoins.massDestroy');
            Route::resource('Vitcoins', 'VitcoinController');
        });

        Route::group(['prefix' => 'TagManagement', 'as' => 'TagManagement.', 'namespace' => 'TagManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/TagManagement/Tags
            Route::delete('Tags/destroy', 'TagController@massDestroy')->name('Tags.massDestroy');
            Route::resource('Tags', 'TagController');
        });

        Route::group(['prefix' => 'ProductManagement', 'as' => 'ProductManagement.', 'namespace' => 'ProductManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/ProductManagement/Products
            Route::delete('Products/destroy', 'ProductController@massDestroy')->name('Products.massDestroy');
            Route::resource('Products', 'ProductController');
            // http://127.0.0.1:8000/SmartShop/ProductManagement/Categories
            Route::delete('Categories/destroy', 'CategoryController@massDestroy')->name('Categories.massDestroy');
            Route::resource('Categories', 'CategoryController');
            // http://127.0.0.1:8000/SmartShop/ProductManagement/ProductWall
            Route::delete('ProductWalls/destroy', 'ProductWallController@massDestroy')->name('ProductWalls.massDestroy');
            Route::resource('ProductWalls', 'ProductWallController');
            // http://127.0.0.1:8000/SmartShop/ProductManagement/VendingMachine/VendingProducts
            Route::delete('VendingMachine/VendingProducts/destroy', 'VendingMachine\VendingProductController@massDestroy')->name('VendingProducts.massDestroy');
            Route::resource('VendingMachine/VendingProducts', 'VendingMachine\VendingProductController');
            // http://127.0.0.1:8000/SmartShop/ProductManagement/OnSell/ShopProducts
            Route::delete('OnSell/ShopProducts/destroy', 'OnSell\ShopProductController@massDestroy')->name('ShopProducts.massDestroy');
            Route::resource('OnSell/ShopProducts', 'OnSell\ShopProductController');
            // http://127.0.0.1:8000/SmartShop/ProductManagement/OnSell/LEDs
            Route::delete('OnSell/LEDs/destroy', 'OnSell\LEDController@massDestroy')->name('LEDs.massDestroy');
            Route::resource('OnSell/LEDs', 'OnSell\LEDController');
            // http://127.0.0.1:8000/SmartShop/ProductManagement/OnSell/ShopProductInventories
            Route::delete('OnSell/ShopProductInventories/destroy', 'OnSell\ShopProductInventoryController@massDestroy')->name('ShopProductInventories.massDestroy');
            Route::resource('OnSell/ShopProductInventories', 'OnSell\ShopProductInventoryController');
        });

        Route::group(['prefix' => 'AdvertisementManagement', 'as' => 'AdvertisementManagement.', 'namespace' => 'AdvertisementManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/AdvertisementManagement/Advertisements
            Route::delete('ad/destroy', 'AdvertisementController@massDestroy')->name('ad.massDestroy');
            Route::resource('ad', 'AdvertisementController');
        });

        Route::group(['prefix' => 'TransactionManagement', 'as' => 'TransactionManagement.', 'namespace' => 'TransactionManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/TransactionManagement/Transactions
            Route::delete('Transactions/destroy', 'TransactionController@massDestroy')->name('Transactions.massDestroy');
            Route::resource('Transactions', 'TransactionController');
            // http://127.0.0.1:8000/SmartShop/TransactionManagement/LockerTransactions
            Route::delete('LockerTransactions/destroy', 'LockerTransactionController@massDestroy')->name('LockerTransactions.massDestroy');
            Route::resource('LockerTransactions', 'LockerTransactionController');
            // http://127.0.0.1:8000/SmartShop/TransactionManagement/ProductTransactions
            Route::delete('ProductTransactions/destroy', 'ProductTransactionController@massDestroy')->name('ProductTransactions.massDestroy');
            Route::resource('ProductTransactions', 'ProductTransactionController');
            // http://127.0.0.1:8000/SmartShop/TransactionManagement/RemittanceTransactions
            Route::delete('RemittanceTransactions/destroy', 'RemittanceTransactionController@massDestroy')->name('RemittanceTransactions.massDestroy');
            Route::resource('RemittanceTransactions', 'RemittanceTransactionController');
        });

        Route::group(['prefix' => 'LockerManagement', 'as' => 'LockerManagement.', 'namespace' => 'LockerManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/LockerManagement/Lockers
            Route::delete('Lockers/destroy', 'LockerController@massDestroy')->name('Lockers.massDestroy');
            Route::resource('Lockers', 'LockerController');
        });

        Route::group(['prefix' => 'SmartBankManagement', 'as' => 'SmartBankManagement.', 'namespace' => 'SmartBankManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/SmartBankManagement/Insurances
            Route::delete('Insurances/destroy', 'InsuranceController@massDestroy')->name('Insurances.massDestroy');
            Route::resource('Insurances', 'InsuranceController');
            // http://127.0.0.1:8000/SmartShop/SmartBankManagement/Stocks
            Route::delete('Stocks/destroy', 'StockController@massDestroy')->name('Stocks.massDestroy');
            Route::resource('Stocks', 'StockController');
        });
    });
});


/***********************************************
 * Smart-Shop-FYP (checkout side)
 ***********************************************/
Route::group(['prefix' => 'ProductCheckout', 'as' => 'ProductCheckout.', 'namespace' => 'ProductCheckout'], function () {
    Route::get('/', 'ProductCheckoutController@index')->name('index');
    Route::post('checkout_temp','ProductCheckoutController@checkout_temp')->name('checkout_temp');
});

/***********************************************
 * Face-api.js
 ***********************************************/
Route::group(['prefix' => 'face', 'as' => 'face.', 'namespace' => 'Face'], function () {
    Route::get('/', 'FaceController@index')->name('index');
});

/***********************************************
 * S-Shop
 ***********************************************/
Route::group(['prefix' => 's-shop', 'as' => 'sshop.'], function () {
    Route::get('/', 'SShopController@advertisement');
    Route::get('advertisement', 'SShopController@advertisement')->name('advertisement');
    Route::get('maps', 'SShopController@maps');
    Route::get('shopping', 'SShopController@shopping')->name('shopping');
    Route::get('shopping/detail/{id}', 'SShopController@shopping_detail')->name('shopping.detail');
    Route::get('splash', 'SShopController@splash')->name('splash');
    Route::get('test', 'SShopController@test');

    Route::get('login-qr-approve', 'SShopController@login_qr_approve');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('history', 'SShopController@history');
        Route::get('profile', 'SShopController@profile')->name('profile');
        Route::post('logout', 'SShopController@logout');
    });

    Route::get('history', 'SShopController@history');
});

/***********************************************
 * Smart Banking
 ***********************************************/
Route::group(['prefix' => 'smart-banking', 'as' => 'sbanking.'], function () {
    Route::get('/', 'SmartBankingController@login_qr');
    Route::get('login', 'SmartBankingController@login_qr')->name('login');
    Route::get('login-text', 'SmartBankingController@login');
    Route::get('login-qr-approve', 'SmartBankingController@login_qr_approve');
    Route::post('login-text', 'Auth\SmartBankingLoginController@login');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('dashboard', 'SmartBankingController@dashboard')->name('dash');
        Route::get('insurance', 'SmartBankingController@insurance');
        Route::get('insurance/detail/{id}', 'SmartBankingController@insurance_detail');
        Route::get('insurance/subscribe/{id}/{type}', 'SmartBankingController@insurance_subscribe');

        Route::get('stock', 'SmartBankingController@stock');
        Route::get('transaction', 'SmartBankingController@transaction');
        Route::get('transfer', 'SmartBankingController@transfer');
        Route::post('transfer', 'SmartBankingController@transfer_action');

        Route::post('logout', 'Auth\SmartBankingLoginController@logout');
    });
});

/***********************************************
 * S_Shop Monitor
 ***********************************************/

Route::group(['prefix' => 's-shop-monitor', 'as' => 'smonitor.'], function () {
    Route::get('/', 'SShopMonitorController@index')->name('index');
});
