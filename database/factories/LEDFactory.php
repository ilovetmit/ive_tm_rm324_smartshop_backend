<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductManagement\ShopProductManagement\LED;
use App\Models\ProductManagement\ShopProductManagement\shop_product;
use Faker\Generator as Faker;

$factory->define(LED::class, function (Faker $faker) {
    $shop_product = shop_product::all()->pluck('id');
    return [
        'shop_product_id' => $faker->randomElement($shop_product),
    ];
});
