<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_buy_by_user extends Model {
    public static function getAllGamesBougth() {
        $gamesBougth = [];
        $games = Game_buy_by_user::all();
        foreach($games as $game) {
            $allInformation = Game_activation_key::getActivationKeyAndGame($game->game_activation_key_id);
            // Attribution de la data à laquelle à été acheté le jeu
            $allInformation->created_at = $game->created_at;
            $gamesBougth[] = $allInformation;
        };
        return $gamesBougth;
    }

    public static function getListGamesBougth($user_id) {
        $gamesBougth = [];
        foreach(Game_buy_by_user::where('user_id', $user_id)->get() as $game) {
            $gamesBougth[] = Game_activation_key::getActivationKeyAndGame($game->game_activation_key_id);
        };
        return $gamesBougth;
    }
}
