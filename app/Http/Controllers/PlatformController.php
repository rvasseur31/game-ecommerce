<?php

namespace App\Http\Controllers;

use App\Platform;
use Illuminate\Http\Request;
use Whoops\Handler\PlainTextHandler;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platforms = Platform::all();

        return view('platforms.index', compact('platforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('platforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required',
            'telephone'=>'required'
        ]);

        $platform = new Platform([
            'platform' => $request->get('platform')
        ]);
        $platform->save();
        return redirect('/plateforme')->with('success', 'platform bien enregistré !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function show(Platform $platform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function edit(Platform $platform, $id)
    {
        $platform = Platform::find($id);
        return view('platforms.edit', compact('platform'));     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Platform $platform, $id)
    {

        $platform = Platform::find($id);
        $platform->platform =  $request->get('platform');
        $platform->save();

        return redirect('/plateforme')->with('success', 'platform mis à jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Platform $platform, $id)
    {
        $platform = Platform::find($id);
        $platform->delete();

        return redirect('/plateforme')->with('success', 'platform bien supprimé');
    }




}
