<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game_buy_by_user;
use Faker\Generator as Faker;

$factory->define(Game_buy_by_user::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'game_activation_key_id' => 1,
        'order_id' => 1
    ];
});
