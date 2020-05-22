<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GamePlatform;
use Faker\Generator as Faker;

$factory->define(GamePlatform::class, function (Faker $faker) {
    return [
        'game_id' => $faker->numberBetween($min = 1, $max = 10),
        'platform_id' => $faker->numberBetween($min = 1, $max = 4),
        'filename' => "zF8fBEZukBN7GaYBIvKBnClh4NfX7sAjLB0ULTcS.png",
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 30, $max = 70),
    ];
});
