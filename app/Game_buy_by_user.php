<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_buy_by_user extends Model {
    public static function getListGamesBougth($user_id) {
        $gameBougth = [];
        foreach(Game_buy_by_user::where('user_id', $user_id)->get() as $game) {
            $gameBougth[] = Game_activation_key::getActivationKeyAndGame($game->game_activation_key_id);
        };
        return $gameBougth;
    }
}
