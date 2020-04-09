<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game_activation_key;
use Faker\Generator as Faker;

$factory->define(Game_activation_key::class, function (Faker $faker) {
    return [
        'game_platforms_id' => 1,
        'activation_key' => $faker->uuid,
        'used' => $faker->boolean
    ];
});
