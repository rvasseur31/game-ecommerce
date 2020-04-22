<?php

namespace App\Http\Controllers;

use App\GamePlatform;
use App\Platform;
use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;



class GamePlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.game.index')
            ->with('platforms', Platform::all())
            ->with('games', GamePlatform::allGames()->paginate(12));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.game.create')
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
        $image = InterventionImage::make($request->image)->widen(500)->encode();
        Storage::put('public/thumbs/' . $path, $image);

        $game = new Game();
        $game->title = $inputs["title"];
        $game->description = $inputs["description"];
        ///$game->save();
        $inputs = $request->except(['_token', 'title', 'description', 'image']);
        $gamePlatform = new GamePlatform();
        foreach ($inputs as $key => $value) {
            $gamePlatform->$key = $value;
        }
        $gamePlatform->filename = $path;
        $gamePlatform->save();

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
        return view('gamePlatform.edit', ['gamePlatform' => GamePlatform::find($gamePlatform)]);
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