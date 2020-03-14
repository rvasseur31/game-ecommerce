<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class PublicController extends Controller {
    public function popular() {
        return 0;
    }

    public function allGames() {
        return view('list-game')->with('games', Game::all());
    }

}
