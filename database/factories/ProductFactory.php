<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Products\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $status = $faker->randomElement(['1', '2']);
    $word_num = $faker->numberBetween($min = 1, $max = 4);
    return [
        'name'          => $faker->words($nb = $word_num, $asText = true),
        'price'         => $faker->numberBetween($min = 20, $max = 40),
        'quantity'      => 100,
        'image'         => 'icon_product.jpg',
        'description'   => $faker->text($maxNbChars = 10),
        'status'        => $status,
    ];
});
