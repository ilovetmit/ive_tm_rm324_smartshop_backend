<?php

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
            RolesTableSeeder::class,
            AddressesTableSeeder::class,            
            AdvertismentsTableSeeder::class,
            CategoriesTableSeeder::class,
            DevicesTableSeeder::class,
            InterestsTableSeeder::class,
            ProductsTableSeeder::class,
            VendingProductsTableSeeder::class,
            TransactionsTableSeeder::class,
            ShopProductsTableSeeder::class,
            ShopProductInventoriesTableSeeder::class,
            LEDsTableSeeder::class,
            LockersTableSeeder::class,
            ProductWallsTableSeeder::class,
            LockerTransactionsTableSeeder::class,
            ProductTransactionsTableSeeder::class,
            RemittanceTransactionsTableSeeder::class,
            TagsTableSeeder::class,
            PermissionTableSeeder::class,
            RoleUserTableSeeder::class,
            PermissionRoleTableSeeder::class,

        ]);
        // Model::reguard();
    }
}
