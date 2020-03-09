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

        // http://127.0.0.1:8000/SmartShop/UserManagement
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

        // http://127.0.0.1:8000/SmartShop/InformationManagement
        Route::group(['prefix' => 'InformationManagement', 'as' => 'InformationManagement.', 'namespace' => 'InformationManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/InformationManagement/Addresses
            Route::delete('Addresses/destroy', 'AddressController@massDestroy')->name('Addresses.massDestroy');
            Route::resource('Addresses', 'AddressController');
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

        // http://127.0.0.1:8000/SmartShop/TagManagement/Tags
        Route::group(['prefix' => 'TagManagement', 'as' => 'TagManagement.', 'namespace' => 'TagManagement'], function () {
            Route::delete('Tags/destroy', 'TagController@massDestroy')->name('Tags.massDestroy');
            Route::resource('Tags', 'TagController');
        });

        // http://127.0.0.1:8000/SmartShop/ProductManagement
        Route::group(['prefix' => 'ProductManagement', 'as' => 'ProductManagement.', 'namespace' => 'ProductManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/ProductManagement/Products
            Route::delete('Products/destroy', 'ProductController@massDestroy')->name('Products.massDestroy');
            Route::resource('Products', 'ProductController');
            // http://127.0.0.1:8000/SmartShop/ProductManagement/Categories
            Route::delete('Categories/destroy', 'CategoryController@massDestroy')->name('Categories.massDestroy');
            Route::resource('Categories', 'CategoryController');
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
            // http://127.0.0.1:8000/SmartShop/ProductManagement/ProductWall
            Route::delete('ProductWalls/destroy', 'ProductWallController@massDestroy')->name('ProductWalls.massDestroy');
            Route::resource('ProductWalls', 'ProductWallController');
        });

        // http://127.0.0.1:8000/SmartShop/AdvertisementManagement/Advertisements
        Route::group(['prefix' => 'AdvertisementManagement', 'as' => 'AdvertisementManagement.', 'namespace' => 'AdvertisementManagement'], function () {
            Route::delete('ad/destroy', 'AdvertisementController@massDestroy')->name('ad.massDestroy');
            Route::resource('ad', 'AdvertisementController');
        });


        // http://127.0.0.1:8000/SmartShop/TransactionManagement
        Route::group(['prefix' => 'TransactionManagement', 'as' => 'TransactionManagement.', 'namespace' => 'TransactionManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/TransactionManagement/Transactions
            Route::delete('Transactions/destroy', 'TransactionController@massDestroy')->name('Transactions.massDestroy');
            Route::resource('Transactions', 'TransactionController');
            // http://127.0.0.1:8000/SmartShop/TransactionManagement/RemittanceTransactions
            Route::delete('RemittanceTransactions/destroy', 'RemittanceTransactionController@massDestroy')->name('RemittanceTransactions.massDestroy');
            Route::resource('RemittanceTransactions', 'RemittanceTransactionController');
            // http://127.0.0.1:8000/SmartShop/TransactionManagement/ProductTransactions
            Route::delete('ProductTransactions/destroy', 'ProductTransactionController@massDestroy')->name('ProductTransactions.massDestroy');
            Route::resource('ProductTransactions', 'ProductTransactionController');
            // http://127.0.0.1:8000/SmartShop/TransactionManagement/LockerTransactions
            Route::delete('LockerTransactions/destroy', 'LockerTransactionController@massDestroy')->name('LockerTransactions.massDestroy');
            Route::resource('LockerTransactions', 'LockerTransactionController');
        });

        // http://127.0.0.1:8000/SmartShop/LockerManagement
        Route::group(['prefix' => 'LockerManagement', 'as' => 'LockerManagement.', 'namespace' => 'LockerManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/LockerManagement/Lockers
            Route::delete('Lockers/destroy', 'LockerController@massDestroy')->name('Lockers.massDestroy');
            Route::resource('Lockers', 'LockerController');
        });

        // http://127.0.0.1:8000/SmartShop/SmartBankManagement
        Route::group(['prefix' => 'SmartBankManagement', 'as' => 'SmartBankManagement.', 'namespace' => 'SmartBankManagement'], function () {
            // http://127.0.0.1:8000/SmartShop/SmartBankManagement/Stocks
            Route::delete('Stocks/destroy', 'StockController@massDestroy')->name('Stocks.massDestroy');
            Route::resource('Stocks', 'StockController');
            // http://127.0.0.1:8000/SmartShop/SmartBankManagement/Insurances
            Route::delete('Insurances/destroy', 'InsuranceController@massDestroy')->name('Insurances.massDestroy');
            Route::resource('Insurances', 'InsuranceController');
        });
    });
});
