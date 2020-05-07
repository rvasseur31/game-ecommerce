<?php

namespace App\Http\Controllers;

use App\GamePlatform;
use App\Platform;
use App\Game;
use App\Game_activation_key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use Faker\Factory as Faker;



class GamePlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.game.index')
            ->with('games', GamePlatform::allGames()->paginate(12));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return $this->createStepOne();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepOne() {
        return view('admin.game.create-step-one')
            ->with('games', Game::all());
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStepOne(Request $request) {
        $inputs = $request->except("_token");
        if (array_key_exists("game_id",$inputs)) {
            $game = Game::find($inputs["game_id"]);
        } else {
            $validatedData = $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
    
            $game = new Game();
            $game->fill($validatedData);
        }
        $request->session()->put('game', $game);
        return redirect('/admin-game/create/two');
    }

    /**
     * Show the step 2 Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request) {
        $game = $request->session()->get('game');
        return view('admin.game.create-step-two')
            ->with('platforms', Platform::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $inputs = $request->except('_token');
        $path = basename($inputs['image']->store('public/images'));
        $image = InterventionImage::make($request->image)->widen(200)->encode();
        Storage::put('public/thumbs/' . $path, $image);

        // Création du jeu
        $game = $request->session()->get('game');
        if (!array_key_exists("id", $game)) {
            $game = new Game();
            $game->title = $request->session()->get('game')["title"];
            $game->description = $request->session()->get('game')["description"];
            $game->save();
        }

        // Création du jeu par plateforme
        $inputs = $request->except(['_token', 'title', 'description', 'image']);
        $gamePlatform = new GamePlatform();
        foreach ($inputs as $key => $value) {
            $gamePlatform->$key = $value;
        }
        $gamePlatform->filename = $path;
        $gamePlatform->game_id = $game->id;
        $gamePlatform->save();

        // Création des clés d'activation du jeu
        $faker = Faker::create();
        for ($index = 0; $index < $inputs["stock"]; $index++) {
            $gameActivationKey = new Game_activation_key();
            $gameActivationKey->game_platforms_id = $gamePlatform->id;
            $gameActivationKey->activation_key = $faker->uuid;
            $gameActivationKey->save();
        }

        return redirect(route('admin-game.index'))->with('success', 'Jeu enregistré avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $gamePlatform
     * @return \Illuminate\Http\Response
     */
    public function show($gamePlatform) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $gamePlatform
     * @return \Illuminate\Http\Response
     */
    public function edit($gamePlatform) {
        return view('admin.game.edit')
            ->with('platforms', Platform::all())
            ->with('game', GamePlatform::find($gamePlatform));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $gamePlatform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gamePlatform) {
        $inputs = $request->except('_token', '_method');
        $gamePlatform = GamePlatform::find($gamePlatform);
        foreach ($inputs as $key => $value) {
            $gamePlatform->$key = $value;
        }
        $gamePlatform->save();

        return redirect(route('gamePlatform.index'))->with('success', 'Jeu mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $gamePlatform
     * @return \Illuminate\Http\Response
     */
    public function destroy($gamePlatform) {
        $gamePlatform = GamePlatform::find($gamePlatform);
        $gamePlatform->delete();

        return redirect(route('gamePlatform.index'))->with('success', 'gamePlatform supprimé avec succès !');
    }
}