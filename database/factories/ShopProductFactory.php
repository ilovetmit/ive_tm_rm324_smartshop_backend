<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductManagement\Product;
use App\Models\ProductManagement\ShopProductManagement\shop_product;
use Faker\Generator as Faker;

$factory->define(shop_product::class, function (Faker $faker) {
    $product_id = Product::all()->pluck('id');
    return [
        'product_id'    => $faker->randomElement($product_id),
        'qrcode'        => $faker->md5,
    ];
});
