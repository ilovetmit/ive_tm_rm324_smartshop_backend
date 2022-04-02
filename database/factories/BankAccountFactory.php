<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\InformationManagement\BankAccount;
use App\Models\UserManagement\User;

$factory->define(BankAccount::class, function (Faker $faker) {
    $user_id = User::all()->pluck('id');
    return [
        'user_id'             => $faker->randomElement($user_id), //error in random
        'current_account'     => $faker->numberBetween($min = 20, $max = 40),
        'saving_account'      => $faker->numberBetween($min = 20, $max = 40),
    ];
});
