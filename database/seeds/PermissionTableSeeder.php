<?php

use Illuminate\Database\Seeder;
use App\Models\UserManagement\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // => UserManagement            permission                                      => user_management_access               (menu access)
        //                              role
        //                              user
        // => InformationManagement     address                                         => information_management_access         (menu access)
        //                              device
        //                              interest
        //                              vitcoin
        // => ProductManagement         product                                         => product_management_access            (menu access)
        //                              category
        //                              vending_product
        //                              shop_product
        //                              led
        //                              shop_product_inventory
        //                              product_wall
        // => AdvertisementManagement   advertisement                                  => advertisement_management_access      (menu access)
        // => TransactionManagement     all Transaction                                => transaction_management_access        (menu access)
        //                              remittance_transaction
        //                              product_transaction
        //                              locker_transaction
        // => TagManagement             tag                                            => tag_management_access
        // => LockerManagement          locker                                         => locker_management_access             (menu access)
        //                            
        // => SmartBankManagement           stock                                           => SmartBankManagement_management_access    (menu access)
        //                              insurance                                                                               (menu access)

        // permission               => [create,edit,view,delete,access]
        // role                     => [create,edit,view,delete,access]
        // user                     => [create,edit,view,delete,access]
        // device                   => [create,edit,view,delete,access]
        // address                  => [create,edit,view,delete,access]
        // interest                 => [create,edit,view,delete,access]
        // transaction              => [create,edit,view,delete,access]
        // locker_transaction       => [create,edit,view,delete,access]
        // remittance_transaction   => [create,edit,view,delete,access]
        // product_transaction      => [create,edit,view,delete,access]
        // locker                   => [create,edit,view,delete,access]
        // product                  => [create,edit,view,delete,access]
        // category                 => [create,edit,view,delete,access]
        // tag                      => [create,edit,view,delete,access]
        // advertisement            => [create,edit,view,delete,access]
        // product_wall             => [create,edit,view,delete,access]
        // shop_product             => [create,edit,view,delete,access]
        // shop_product_inventory   => [create,edit,view,delete,access]
        // LED                      => [create,edit,view,delete,access]
        // vending_product          => [create,edit,view,delete,access]
        // stock                    => [create,edit,view,delete,access]
        // insurance                => [create,edit,view,delete,access]
        // vitcoin                  => [create,edit,view,delete,access]

        // @formatter:off
        $permissions = [
            // UserManagement 
            ['name'=>'user_management_access'],
                // permission
                ['name'=>'permission_create'],
                ['name'=>'permission_edit'],
                ['name'=>'permission_view'],
                ['name'=>'permission_delete'],
                ['name'=>'permission_access'],
                // role
                ['name'=>'role_create'],
                ['name'=>'role_edit'],
                ['name'=>'role_view'],
                ['name'=>'role_delete'],
                ['name'=>'role_access'],
                // user
                ['name'=>'user_create'],
                ['name'=>'user_edit'],
                ['name'=>'user_view'],
                ['name'=>'user_delete'],
                ['name'=>'user_access'],
            // InformationManagement
            ['name'=>'information_management_access'],
                // address
                ['name'=>'address_create'],
                ['name'=>'address_edit'],
                ['name'=>'address_view'],
                ['name'=>'address_delete'],
                ['name'=>'address_access'],
                // device
                ['name'=>'device_create'],
                ['name'=>'device_edit'],
                ['name'=>'device_view'],
                ['name'=>'device_delete'],
                ['name'=>'device_access'],
                // interest
                ['name'=>'interest_create'],
                ['name'=>'interest_edit'],
                ['name'=>'interest_view'],
                ['name'=>'interest_delete'],
                ['name'=>'interest_access'],
                // vitcoin
                ['name'=>'vitcoin_create'],
                ['name'=>'vitcoin_edit'],
                ['name'=>'vitcoin_view'],
                ['name'=>'vitcoin_delete'],
                ['name'=>'vitcoin_access'],
                // bank_account
                ['name'=>'bank_account_create'],
                ['name'=>'bank_account_edit'],
                ['name'=>'bank_account_view'],
                ['name'=>'bank_account_delete'],
                ['name'=>'bank_account_access'],
            // ProductManagement
            ['name'=>'product_management_access'],
                // product
                ['name'=>'product_create'],
                ['name'=>'product_edit'],
                ['name'=>'product_view'],
                ['name'=>'product_delete'],
                ['name'=>'product_access'],
                // category
                ['name'=>'category_create'],
                ['name'=>'category_edit'],
                ['name'=>'category_view'],
                ['name'=>'category_delete'],
                ['name'=>'category_access'],
                // vending_product
                ['name'=>'vending_product_create'],
                ['name'=>'vending_product_edit'],
                ['name'=>'vending_product_view'],
                ['name'=>'vending_product_delete'],
                ['name'=>'vending_product_access'],
                // shop_product
                ['name'=>'shop_product_create'],
                ['name'=>'shop_product_edit'],
                ['name'=>'shop_product_view'],
                ['name'=>'shop_product_delete'],
                ['name'=>'shop_product_access'],
                // led
                ['name'=>'led_create'],
                ['name'=>'led_edit'],
                ['name'=>'led_view'],
                ['name'=>'led_delete'],
                ['name'=>'led_access'],
                // shop_product_inventory
                ['name'=>'shop_product_inventory_create'],
                ['name'=>'shop_product_inventory_edit'],
                ['name'=>'shop_product_inventory_view'],
                ['name'=>'shop_product_inventory_delete'],
                ['name'=>'shop_product_inventory_access'],
                // product_wall
                ['name'=>'product_wall_create'],
                ['name'=>'product_wall_edit'],
                ['name'=>'product_wall_view'],
                ['name'=>'product_wall_delete'],
                ['name'=>'product_wall_access'],
            // AdvertisementManagement
            ['name'=>'advertisement_management_access'],
                // advertisement
                ['name'=>'advertisement_create'],
                ['name'=>'advertisement_edit'],
                ['name'=>'advertisement_view'],
                ['name'=>'advertisement_delete'],
                ['name'=>'advertisement_access'],
            // TagManagement
            ['name'=>'tag_management_access'],
                // tag
                ['name'=>'tag_create'],
                ['name'=>'tag_edit'],
                ['name'=>'tag_view'],
                ['name'=>'tag_delete'],
                ['name'=>'tag_access'],
            // TransactionManagement
            ['name'=>'transaction_management_access'],
                // transaction
                // ['name'=>'transaction_create'],
                // ['name'=>'transaction_edit'],
                ['name'=>'transaction_view'],
                // ['name'=>'transaction_delete'],
                ['name'=>'transaction_access'],
                // remittance_transaction
                // ['name'=>'remittance_transaction_create'],
                // ['name'=>'remittance_transaction_edit'],
                ['name'=>'remittance_transaction_view'],
                // ['name'=>'remittance_transaction_delete'],
                ['name'=>'remittance_transaction_access'],
                // product_transaction
                // ['name'=>'product_transaction_create'],
                // ['name'=>'product_transaction_edit'],
                ['name'=>'product_transaction_view'],
                // ['name'=>'product_transaction_delete'],
                ['name'=>'product_transaction_access'],
                // locker_transaction
                // ['name'=>'locker_transaction_create'],
                // ['name'=>'locker_transaction_edit'],
                ['name'=>'locker_transaction_view'],
                // ['name'=>'locker_transaction_delete'],
                ['name'=>'locker_transaction_access'],
            // LockerManagement
            ['name'=>'locker_management_access'],
                // locker
                ['name'=>'locker_create'],
                ['name'=>'locker_edit'],
                ['name'=>'locker_view'],
                ['name'=>'locker_delete'],
                ['name'=>'locker_access'],
            // SmartBankManagement
            ['name'=>'smart_bank_management_access'],
                // stock
                ['name'=>'stock_create'],
                ['name'=>'stock_edit'],
                ['name'=>'stock_view'],
                ['name'=>'stock_delete'],
                ['name'=>'stock_access'],
                // insurance
                ['name'=>'insurance_create'],
                ['name'=>'insurance_edit'],
                ['name'=>'insurance_view'],
                ['name'=>'insurance_delete'],
                ['name'=>'insurance_access'],
        ];

        Permission::insert($permissions);
    }
}