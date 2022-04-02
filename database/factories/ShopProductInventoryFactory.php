<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductManagement\OnSell\ShopProduct;
use App\Models\ProductManagement\OnSell\ShopProductInventory;
use Faker\Generator as Faker;

$factory->define(ShopProductInventory::class, function (Faker $faker) {
    $shop_product_id = ShopProduct::all()->pluck('id');
    $is_sold = $faker->randomElement(['1', '2']);
    return [
        'shop_product_id'   => $faker->randomElement($shop_product_id),
        'rfid_code'         => $faker->md5,
        'is_sold'           => $is_sold,
    ];
});
