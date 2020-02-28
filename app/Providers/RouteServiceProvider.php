<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
        Route::model('Permission',              'App\Models\UserManagement\Permission');
        Route::model('Role',                    'App\Models\UserManagement\Role');
        Route::model('User',                    'App\Models\UserManagement\User');
        Route::model('User',                    'App\Models\UserManagement\User');
        Route::model('Advertisement',           'App\Models\AdvertisementManagement\Advertisement');
        Route::model('Address',                 'App\Models\InformationManagement\Address');
        Route::model('Device',                  'App\Models\InformationManagement\Device');
        Route::model('Interest',                'App\Models\InformationManagement\Interest');
        Route::model('Vitcoin',                 'App\Models\InformationManagement\Vitcoin');
        Route::model('Locker',                  'App\Models\LockerManagement\Locker');
        Route::model('Product',                 'App\Models\ProductManagement\Product');
        Route::model('Category',                'App\Models\ProductManagement\Category');
        Route::model('ProductWall',             'App\Models\ProductManagement\ProductWall');
        Route::model('LED',                     'App\Models\ProductManagement\OnSell\LED');
        Route::model('ShopProduct',             'App\Models\ProductManagement\OnSell\ShopProduct');
        Route::model('ShopProductInventory',    'App\Models\ProductManagement\OnSell\ShopProductInventory');
        Route::model('VendingProduct',          'App\Models\ProductManagement\VendingMachine\VendingProduct');
        Route::model('Insurance',               'App\Models\SmartBankManagement\Insurance');
        Route::model('Stock',                   'App\Models\SmartBankManagement\Stock');
        Route::model('Tag',                     'App\Models\TagManagement\Tag');
        Route::model('Transaction',             'App\Models\TransactionManagement\Transaction');
        Route::model('LockerTransaction',       'App\Models\TransactionManagement\LockerTransaction');
        Route::model('RemittanceTransaction',   'App\Models\TransactionManagement\RemittanceTransaction');
        Route::model('ProductTransaction',      'App\Models\TransactionManagement\ProductTransaction');
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
