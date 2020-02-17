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
        // => UserManagement            permission                                      => user_management_access           (menu access)
        //                              role
        //                              user - address/interest
        // => ProductManagement         Product - category/tag                          => product_management_access        (menu access)
        //                              >>>product_transaction
        //                              vending_product
        //                              shop_product - led/shop_product_inventories
        // => Product_wall                                                              => product_wall_management_access   (menu access)
        // => AdvertismentManagement                                                    => advertisment_management_access   (menu access)
        // => TransactionManagement     Transaction                                     => transaction_management_access    (menu access)
        //                              remittance_transaction
        //                              >product_transaction
        //                              >locker_transaction
        // => LockerManagement          Locker                                          => locker_management_access         (menu access)
        //                              >>>LockerTransaction
        // => Stock                                                                     => stock_management_access          (menu access)
        // => Insurance                                                                 => insurance_management_access      (menu access)
        // permission               => [create,edit,view,delete,access] 01,02,03,04,05
        // role                     => [create,edit,view,delete,access] 06,07,08,09,10
        // user                     => [create,edit,view,delete,access] 11,12,13,14,15
        // device                   => [create,edit,view,delete,access] 16,17,18,19,10
        // address                  => [create,edit,view,delete,access] 21,22,23,24,25
        // interest                 => [create,edit,view,delete,access] 26,27,28,29,30
        // transaction              => [create,edit,view,delete,access] 31,32,33,34,35
        // locker_transaction
        // remittance_transaction
        // product_transaction
        // locker                   => [create,edit,view,delete,access] 36,37,38,39,40
        // product                  => [create,edit,view,delete,access] 41,42,43,44,45
        // category                 => [create,edit,view,delete,access] 46,47,48,49,50
        // tag                      => [create,edit,view,delete,access] 51,52,53,54,55
        // advertisement            => [create,edit,view,delete,access] 56,57,58,59,60
        // product_wall             => [create,edit,view,delete,access] 61,62,63,64,65
        // shop_product             => [create,edit,view,delete,access] 66,67,68,69,70
        // shop_product_inventory   => [create,edit,view,delete,access] 71,72,73,74,75
        // LED                      => [create,edit,view,delete,access] 76,77,78,79,80
        // vending_product          => [create,edit,view,delete,access] 81,82,83,84,85
        // stock                    => [create,edit,view,delete,access] 86,87,88,89,90
        // insurance                => [create,edit,view,delete,access] 91,92,93,94,95
        // vitcoin

        $permissions = [
            [
                'name'  => 'user_management_access',
            ],
            [
                'name'  => 'product_management_access',
            ],
            [
                'name'  => 'advertisment_management_access',
            ],
            [
                'name'  => 'transaction_management_access',
            ],
            [
                'name'  => 'locker_management_access',
            ],
            [
                'name'  => 'product_wall_management_access',
            ],
            [
                'name'  => 'stock_management_access',
            ],
            [
                'name'  => 'insurance_management_access',
            ],
            // permission
            [
                'name'  => 'permission_create',
            ],
            [
                'name'  => 'permission_edit',
            ],
            [
                'name'  => 'permission_view',
            ],
            [
                'name'  => 'permission_delete',
            ],
            [
                'name'  => 'permission_access',
            ],
            // role
            [
                'name'  => 'role_create',
            ],
            [
                'name'  => 'role_edit',
            ],
            [
                'name'  => 'role_view',
            ],
            [
                'name'  => 'role_delete',
            ],
            [
                'name'  => 'role_access',
            ],
            // user
            [
                'name'  => 'user_create',
            ],
            [
                'name'  => 'user_edit',
            ],
            [
                'name'  => 'user_view',
            ],
            [
                'name'  => 'user_delete',
            ],
            [
                'name'  => 'user_access',
            ],
            // device
            [
                'name'  => 'device_create',
            ],
            [
                'name'  => 'device_edit',
            ],
            [
                'name'  => 'device_view',
            ],
            [
                'name'  => 'device_delete',
            ],
            [
                'name'  => 'device_access',
            ],
            // address
            [
                'name'  => 'address_create',
            ],
            [
                'name'  => 'address_edit',
            ],
            [
                'name'  => 'address_view',
            ],
            [
                'name'  => 'address_delete',
            ],
            [
                'name'  => 'address_access',
            ],
            // interest
            [
                'name'  => 'interest_create',
            ],
            [
                'name'  => 'interest_edit',
            ],
            [
                'name'  => 'interest_view',
            ],
            [
                'name'  => 'interest_delete',
            ],
            [
                'name'  => 'interest_access',
            ],
            // transaction
            [
                'name'  => 'transaction_create',
            ],
            [
                'name'  => 'transaction_edit',
            ],
            [
                'name'  => 'transaction_view',
            ],
            [
                'name'  => 'transaction_delete',
            ],
            [
                'name'  => 'transaction_access',
            ],
            // locker
            [
                'name'  => 'locker_create',
            ],
            [
                'name'  => 'locker_edit',
            ],
            [
                'name'  => 'locker_view',
            ],
            [
                'name'  => 'locker_delete',
            ],
            [
                'name'  => 'locker_access',
            ],
            // product
            [
                'name'  => 'product_create',
            ],
            [
                'name'  => 'product_edit',
            ],
            [
                'name'  => 'product_view',
            ],
            [
                'name'  => 'product_delete',
            ],
            [
                'name'  => 'product_access',
            ],
            // category
            [
                'name'  => 'category_create',
            ],
            [
                'name'  => 'category_edit',
            ],
            [
                'name'  => 'category_view',
            ],
            [
                'name'  => 'category_delete',
            ],
            [
                'name'  => 'category_access',
            ],
            // tag
            [
                'name'  => 'tag_create',
            ],
            [
                'name'  => 'tag_edit',
            ],
            [
                'name'  => 'tag_view',
            ],
            [
                'name'  => 'tag_delete',
            ],
            [
                'name'  => 'tag_access',
            ],
            // advertisement
            [
                'name'  => 'advertisement_create',
            ],
            [
                'name'  => 'advertisement_edit',
            ],
            [
                'name'  => 'advertisement_view',
            ],
            [
                'name'  => 'advertisement_delete',
            ],
            [
                'name'  => 'advertisement_access',
            ],
            // product_wall
            [
                'name'  => 'product_wall_create',
            ],
            [
                'name'  => 'product_wall_edit',
            ],
            [
                'name'  => 'product_wall_view',
            ],
            [
                'name'  => 'product_wall_delete',
            ],
            [
                'name'  => 'product_wall_access',
            ],
            // shop_product
            [
                'name'  => 'shop_product_create',
            ],
            [
                'name'  => 'shop_product_edit',
            ],
            [
                'name'  => 'shop_product_view',
            ],
            [
                'name'  => 'shop_product_delete',
            ],
            [
                'name'  => 'shop_product_access',
            ],
            // shop_product_inventory
            [
                'name'  => 'shop_product_inventory_create',
            ],
            [
                'name'  => 'shop_product_inventory_edit',
            ],
            [
                'name'  => 'shop_product_inventory_view',
            ],
            [
                'name'  => 'shop_product_inventory_delete',
            ],
            [
                'name'  => 'shop_product_inventory_access',
            ],
            // LED
            [
                'name'  => 'LED_create',
            ],
            [
                'name'  => 'LED_edit',
            ],
            [
                'name'  => 'LED_view',
            ],
            [
                'name'  => 'LED_delete',
            ],
            [
                'name'  => 'LED_access',
            ],
            // vending_product
            [
                'name'  => 'vending_product_create',
            ],
            [
                'name'  => 'vending_product_edit',
            ],
            [
                'name'  => 'vending_product_view',
            ],
            [
                'name'  => 'vending_product_delete',
            ],
            [
                'name'  => 'vending_product_access',
            ],
            // stock
            [
                'name'  => 'stock_create',
            ],
            [
                'name'  => 'stock_edit',
            ],
            [
                'name'  => 'stock_view',
            ],
            [
                'name'  => 'stock_delete',
            ],
            [
                'name'  => 'stock_access',
            ],
            // insurance
            [
                'name'  => 'insurance_create',
            ],
            [
                'name'  => 'insurance_edit',
            ],
            [
                'name'  => 'insurance_view',
            ],
            [
                'name'  => 'insurance_delete',
            ],
            [
                'name'  => 'insurance_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
