<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\InformationManagement\Address;
use App\Models\UserManagement\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Address::class, function (Faker $faker) {
    $user_id = User::all()->pluck('id');
    $district = $faker->randomElement(['1', '2', '3', '4', '5', '6']);
    $address1 = $faker->streetName;
    $address2 = $faker->buildingNumber;
    return [
        'user_id'           => $faker->randomElement($user_id),
        'district'          => $district,
        'address1'          => $address1,
        'address2'          => $address2,
    ];
});
