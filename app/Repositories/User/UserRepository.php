<?php

namespace App\Repositories\User;

use App\Game_liked_by_user;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserInterface {
    private $user;

    function __construct(User $user) {
        $this->user = $user;
    }

    public function isFavorite($product_id) {
        if (count(Game_liked_by_user::where('user_id', Auth::id())->where('game_platforms_id', $product_id)->get())) {
            return true;
        }
        return false;
    }

    public function addFavorite($product_id) {
        $gameLiked = new Game_liked_by_user();
        $gameLiked->user_id = Auth::id();
        $gameLiked->game_platforms_id = $product_id;
        $gameLiked->save();

    }

    public function removeFavorite($product_id) {
        Game_liked_by_user::where('user_id', Auth::id())->where('game_platforms_id', $product_id)->delete();
    }
}