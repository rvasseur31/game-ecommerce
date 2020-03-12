<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'description' => $faker->text,
        'stock' => $faker->randomDigit,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 30, $max = 70)
    ];
});
