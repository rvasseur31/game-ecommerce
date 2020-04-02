<?php

namespace App\Http\Controllers;

use App\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('platforms.index')->with('platforms', Platform::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('platforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $inputs = $request->except('_token');
        $platform = new Platform();
        foreach ($inputs as $key => $value) {
            $platform->$key = $value;
        }
        $platform->save();

        return redirect(route('platforms.index'))->with('success', ' Plateforme enregistré avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $platform
     * @return \Illuminate\Http\Response
     */
    public function show($platform) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $game
     * @return \Illuminate\Http\Response
     */
    public function edit($platform) {
        return view('platforms.edit', ['platform' => Platform::find($platform)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $platform) {
        $inputs = $request->except('_token', '_method');
        $platform = Platform::find($platform);
        foreach ($inputs as $key => $value) {
            $platform->$key = $value;
        }
        $platform->save();

        return redirect(route('platforms.index'))->with('success', 'Plateforme mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $platform
     * @return \Illuminate\Http\Response
     */
    public function destroy($platform) {
        $platform = Platform::find($platform);
        $platform->delete();

        return redirect(route('platforms.index'))->with('success', 'plateforme supprimé avec succès !');
    }
}
