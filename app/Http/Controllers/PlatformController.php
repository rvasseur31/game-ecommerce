<?php

namespace App\Http\Controllers;

use App\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller {
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
        return view('platform.create');
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

        return redirect(route('platform.index'))->with('success', 'Jeu enregistré avec succès !');
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
     * @param  integer  $platform
     * @return \Illuminate\Http\Response
     */
    public function edit($platform) {
        return view('platform.edit', ['platform' => Platform::find($platform)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $platform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $platform) {
        $inputs = $request->except('_token', '_method');
        $platform = Platform::find($platform);
        foreach ($inputs as $key => $value) {
            $platform->$key = $value;
        }
        $platform->save();

        return redirect(route('platform.index'))->with('success', 'Jeu mis à jour avec succès !');
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

        return redirect(route('platform.index'))->with('success', 'platform supprimé avec succès !');
    }
}
