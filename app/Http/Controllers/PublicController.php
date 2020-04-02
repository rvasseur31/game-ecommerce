<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class PublicController extends Controller {
    public function popular() {
        return 0;
    }

    public function allGames() {
        $gamesBeforeModif = Game::all();
        $games = array();
        for ($index = 0; $index < count($gamesBeforeModif); $index++) {

        }
        return view('list-game')->with('games', Game::all());
    }

    public function showDetails() {
        return view('game-info');
    }

}
