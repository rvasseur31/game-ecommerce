<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('game.index')->with('games', Game::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $inputs = $request->except('_token');
        $game = new Game();
        foreach ($inputs as $key => $value) {
            $game->$key = $value;
        }
        $game->save();

        return redirect(route('game.index'))->with('success', 'Jeu enregistré avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $game
     * @return \Illuminate\Http\Response
     */
    public function show($game) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $game
     * @return \Illuminate\Http\Response
     */
    public function edit($game) {
        return view('game.edit', ['game' => Game::find($game)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $game) {
        $inputs = $request->except('_token', '_method');
        $game = Game::find($game);
        foreach ($inputs as $key => $value) {
            $game->$key = $value;
        }
        $game->save();

        return redirect(route('game.index'))->with('success', 'Jeu mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy($game) {
        $game = game::find($game);
        $game->delete();

        return redirect(route('game.index'))->with('success', 'game supprimé avec succès !');
    }
}
