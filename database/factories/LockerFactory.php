<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lockers\Locker;
use Faker\Generator as Faker;

$factory->define(Locker::class, function (Faker $faker) {
    $is_active = $faker->randomElement(['1', '2']);
    $is_using = $faker->randomElement(['1', '2']);
    return [
        'qrcode'            => $faker->md5,
        'per_hour_price'    => $faker->randomFloat($nbMaxDecimals = true, $min = 10, $max = 40),
        'is_active'         => $is_active,
        'is_using'          => $is_using,
    ];
});
