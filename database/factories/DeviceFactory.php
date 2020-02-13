<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Account_Info_s\Device;
use App\Models\Accounts\User;
use Faker\Generator as Faker;

$factory->define(Device::class, function (Faker $faker) {
    $user_id = User::all()->pluck('id');
    $is_active = $faker->randomElement(['1', '2']);
    return [
        'token'       => 'testToken',
        'user_id'     => $faker->randomElement($user_id),
        'is_active'   => $is_active,
    ];
});
