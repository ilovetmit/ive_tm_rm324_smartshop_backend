<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductManagement\AdvertismentManagement\Advertisment;
use Faker\Generator as Faker;

$factory->define(Advertisment::class, function (Faker $faker) {
    $status = $faker->randomElement(['1', '2']);
    return [
        'header'        => $faker->text($maxNbChars = 10),
        'image'         => 'icon_advertisment.jpg',
        'description'   => $faker->text($maxNbChars = 20),
        'status'        => $status,
    ];
});
