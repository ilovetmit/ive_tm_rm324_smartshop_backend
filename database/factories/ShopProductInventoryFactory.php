<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductManagement\ShopProductManagement\shop_product;
use App\Models\ProductManagement\ShopProductManagement\shop_product_inventory;
use Faker\Generator as Faker;

$factory->define(shop_product_inventory::class, function (Faker $faker) {
    $shop_product_id = shop_product::all()->pluck('id');
    $is_sold = $faker->randomElement(['1', '2']);
    return [
        'shop_product_id'   => $faker->randomElement($shop_product_id),
        'rfid_code'         => $faker->md5,
        'is_sold'           => $is_sold,
    ];
});
