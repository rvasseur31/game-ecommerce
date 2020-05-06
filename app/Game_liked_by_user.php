<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_liked_by_user extends Model {
    public static function getListGamesLiked($user_id) {
        $gameLiked = [];
        foreach(Game_liked_by_user::where('user_id', $user_id)->get() as $game) {
            $gameLiked[] = GamePlatform::game($game->game_platforms_id);
        };
        return $gameLiked;
    }
}
