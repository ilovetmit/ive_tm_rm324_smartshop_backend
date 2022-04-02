<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TagManagement\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name'          => $faker->word,
        'description'   => $faker->text($maxNbChars = 15),
    ];
});
