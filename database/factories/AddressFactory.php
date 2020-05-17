<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\InformationManagement\Address;
use App\Models\UserManagement\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Address::class, function (Faker $faker) {
    // $user_id = User::all()->pluck('id');
    static $user_id = 1;  
    $district = $faker->numberBetween($min = 1, $max = 18);
    $address1 = $faker->streetAddress;
    $address2 = $faker->streetName;
    $address3 = $faker->city;
    return [
        'user_id'           => $user_id++,
        'district'          => $district,
        'address1'          => $address1,
        'address2'          => $address2 . " " . $address3,
    ];
});
