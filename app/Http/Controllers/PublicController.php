<?php

namespace App\Http\Controllers;

use App\Game;
use App\GamePlatform;
use App\Platform;
use App\Repositories\User\UserInterface;

class PublicController extends Controller {
    protected $userRepository;

    public function __construct(UserInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function popular() {
        return 0;
    }

    public function allGames() {
        return view('list-game')->with('games', GamePlatform::allGames()->get());
    }

    /**
     * Show games from specific platform.
     * 
     * @param interger $platform_id : id from table platform
     * @return Response : list of game
     */
    public function gamePerPlatform(int $platform_id) {
        return view('perPlatform')
            ->with('platforms', Platform::all())
            ->with('games', GamePlatform::allGames()->where('platform_id', $platform_id)->paginate(12));
    }

    public function product(int $game_id) {
        return view('product')
            ->with('liked', $this->userRepository->isFavorite($game_id))
            ->with('platforms', Platform::all())
            ->with('gamePlatforms', Game::find($game_id)->hasPlatforms)
            ->with('game', GamePlatform::game($game_id));
    }
    
    public function showDetails() {
        return view('game-info');
    }

}