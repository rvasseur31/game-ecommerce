<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_activation_key extends Model
{
    public function UserGame() {
        return $this->belongsTo('App\User');
    }

    public static function getActivationKeyAndGame($activationKey_id) {
        return Game_activation_key::join('game_platforms', 'game_platforms.id', '=', 'game_activation_keys.game_platforms_id')
            ->join('games', 'games.id', '=', 'game_platforms.game_id')
            ->where('game_activation_keys.id', $activationKey_id)
            ->select('game_activation_keys.activation_key')
            ->addSelect('game_platforms.*')
            ->addSelect('games.title')
            ->addSelect('games.description')
            ->first();
    }
}
