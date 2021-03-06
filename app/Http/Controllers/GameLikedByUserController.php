<?php

namespace App\Http\Controllers;

use App\Game_liked_by_user;
use Illuminate\Http\Request;
use App\Repositories\User\UserInterface;

class GameLikedByUserController extends Controller {
    private $userRepository;

    public function __construct(UserInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function favorite() {
        $inputs = request()->all();
        if (!$inputs["favorite"]) {
            $this->userRepository->removeFavorite($inputs["product"]);
        } else {
            $this->userRepository->addFavorite($inputs["product"]);
        }
        return redirect()->route('product', ['id' => $inputs["product"]]);
    }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Game_liked_by_user  $game_liked_by_user
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Game_liked_by_user $game_liked_by_user)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Game_liked_by_user  $game_liked_by_user
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Game_liked_by_user $game_liked_by_user)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Game_liked_by_user  $game_liked_by_user
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Game_liked_by_user $game_liked_by_user)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Game_liked_by_user  $game_liked_by_user
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Game_liked_by_user $game_liked_by_user)
    // {
    //     //
    // }
}