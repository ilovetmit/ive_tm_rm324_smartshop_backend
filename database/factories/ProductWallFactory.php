<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Products\product_wall;
use App\Models\Products\Product;
use Faker\Generator as Faker;

$factory->define(product_wall::class, function (Faker $faker) {
    $product_id = Product::all()->pluck('id');
    return [
        'qrcode'        => $faker->randomNumber($nbDigits = 8, $strict = false),
        'product_id'    => $faker->randomElement($product_id),
        'message'       => $faker->text($maxNbChars = 30),
    ];
});
