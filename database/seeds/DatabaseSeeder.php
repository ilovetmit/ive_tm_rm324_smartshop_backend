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
            UserTableSeeder::class,
            RoleTableSeeder::class,
            AddressTableSeeder::class,            
            AdvertisementTableSeeder::class,
            CategoryTableSeeder::class,
            DeviceTableSeeder::class,
            InterestTableSeeder::class,
            ProductTableSeeder::class,
            VendingProductTableSeeder::class,
            TransactionTableSeeder::class,
            ShopProductTableSeeder::class,
            ShopProductInventoryTableSeeder::class,
            LEDTableSeeder::class,
            LockerTableSeeder::class,
            ProductWallTableSeeder::class,
            LockerTransactionTableSeeder::class,
            ProductTransactionTableSeeder::class,
            RemittanceTransactionTableSeeder::class,
            TagTableSeeder::class,
            PermissionTableSeeder::class,
            RoleUserTableSeeder::class,
            PermissionRoleTableSeeder::class,

        ]);
        // Model::reguard();
    }
}
