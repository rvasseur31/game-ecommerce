<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer_review;
use Faker\Generator as Faker;

$factory->define(Customer_review::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'game_id' => 1,
        'rating' => $faker->numberBetween($min = 1, $max = 5),
        'title' => $faker->company,
        'description' => $faker->text,
        'validated' => $faker->boolean
    ];
});