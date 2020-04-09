<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamePlatform extends Model {
    public function hasGame() {
        return $this->belongsTo('App\Game', 'game_id');
    }

    public static function game($game_id) {
        return GamePlatform::join('games', 'games.id', '=', 'game_platforms.game_id')
            ->join('platforms', 'platforms.id', '=', 'game_platforms.platform_id')
            ->where('game_platforms.id', $game_id)
            ->first();
    }

    public static function allGames() {
        return GamePlatform::join('games', 'games.id', '=', 'game_platforms.game_id')
            ->join('platforms', 'platforms.id', '=', 'game_platforms.platform_id');
    }

    public function hasManyCustomerReview() {
        return $this->hasMany('App\Customer_review', 'game_platforms_id')
            ->join('users', 'users.id', '=', 'customer_reviews.user_id')
            ->get();
    }
}