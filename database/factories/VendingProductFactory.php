<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductManagement\Product;
use App\Models\ProductManagement\VendingMachine\VendingProduct;
use Faker\Generator as Faker;

$factory->define(VendingProduct::class, function (Faker $faker) {
    $product_id = Product::all()->pluck('id');
    $channel = $faker->randomElement(['1', '2']);
    return [
        'product_id'    => $faker->randomElement($product_id),
        'channel'       => $channel,
    ];
});
