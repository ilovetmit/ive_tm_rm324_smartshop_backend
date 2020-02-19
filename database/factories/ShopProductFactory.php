<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductManagement\Product;
use App\Models\ProductManagement\OnSell\ShopProduct;
use Faker\Generator as Faker;

$factory->define(ShopProduct::class, function (Faker $faker) {
    $product_id = Product::all()->pluck('id');
    return [
        'product_id'    => $faker->randomElement($product_id),
        'qrcode'        => $faker->md5,
    ];
});
