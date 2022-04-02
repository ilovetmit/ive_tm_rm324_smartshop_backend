<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\InformationManagement\Interest;
use Faker\Generator as Faker;

$factory->define(Interest::class, function (Faker $faker) {
    return [
        'name'          => $faker->name,
        'description'   => $faker->text($maxNbChars = 50),
    ];
});
