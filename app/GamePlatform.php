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
            ->select('game_platforms.*')
            ->addSelect('games.title')
            ->addSelect('games.description')
            ->addSelect('platforms.platform')
            ->first();
    }

    public static function allGames() {
        return GamePlatform::join('games', 'games.id', '=', 'game_platforms.game_id')
            ->join('platforms', 'platforms.id', '=', 'game_platforms.platform_id')
            ->select('game_platforms.*')
            ->addSelect('games.title')
            ->addSelect('games.description')
            ->addSelect('platforms.platform');
    }

    public function hasManyCustomerReview() {
        return $this->hasMany('App\Customer_review', 'game_platforms_id')
            ->join('users', 'users.id', '=', 'customer_reviews.user_id')
            ->select('customer_reviews.*')
            ->addSelect('users.firstname')
            ->get();
    }

    public static function getOtherPlatformFromGame($game_id) {
        $gamePlatform = GamePlatform::find($game_id);
        return GamePlatform::where("game_platforms.game_id", $gamePlatform->game_id)
            ->where("game_platforms.id", "!=", $game_id)
            ->join('platforms', 'platforms.id', '=', 'game_platforms.platform_id')
            ->select('game_platforms.*')
            ->addSelect('platforms.platform')
            ->get();
    }

    public static function addView($game_id) {
        $game = GamePlatform::findOrFail($game_id);
        $game->view++;
        $game->save();
    }

    public static function isAvailable($game_id) {
        return sizeof(Game_activation_key::where('game_platforms_id', $game_id)->get());
    }

    public static function tenMostViewedGames() {
        return self::allGames()->orderBy('view', 'desc')->take(10)->get();
    }
}