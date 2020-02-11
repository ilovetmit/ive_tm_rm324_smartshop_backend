<?php

use App\Models\Products\Advertisment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        $this->call([
            UsersTableSeeder::class,
            AddressesTableSeeder::class,
            AdvertismentsTableSeeder::class,
            CategoriesTableSeeder::class,
            DevicesTableSeeder::class,
            InterestsTableSeeder::class,
            LEDsTableSeeder::class,
            LockersTableSeeder::class,
            LockerTransactionsTableSeeder::class,
            ProductsTableSeeder::class,
            ProductWallsTableSeeder::class,
            ProductTransactionsTableSeeder::class,
            RemittanceTransactionsTableSeeder::class,
            ShopProductInventoriesTableSeeder::class,
            ShopProductsTableSeeder::class,
            TagsTableSeeder::class,
            TransactionsTableSeeder::class,
            VendingProductsTableSeeder::class,
        ]);
        // Model::reguard();
    }
}
