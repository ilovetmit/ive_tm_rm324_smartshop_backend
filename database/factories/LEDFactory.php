<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductManagement\OnSell\LED;
use App\Models\ProductManagement\OnSell\ShopProduct;
use Faker\Generator as Faker;

$factory->define(LED::class, function (Faker $faker) {
    $shop_product = ShopProduct::all()->pluck('id');
    return [
        'shop_product_id' => $faker->randomElement($shop_product),
    ];
});
