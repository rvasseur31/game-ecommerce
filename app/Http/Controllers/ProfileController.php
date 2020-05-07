<?php

namespace App\Http\Controllers;

use App\Game_activation_key;
use Illuminate\Http\Request;
use App\Game_liked_by_user;
use App\Game_buy_by_user;
use App\Order;
use App\Platform;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profil')
            ->with('platforms', Platform::all())
            ->with('orders', Order::where('user_id', Auth::id())->get())
            ->with('gamesBought', Game_buy_by_user::getListGamesBougth(Auth::id()))
            ->with('gamesLiked', Game_liked_by_user::getListGamesLiked(Auth::id()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->except('_token', '_method');
        if (!$request->get('password') && !$request->get('password-confirm')) {
            $inputs = $request->except('_token', '_method', 'password', 'password-confirm');
        }
        $user = User::find($id);
        foreach ($inputs as $key => $value) {
            $user->$key = $value;
        }
        if ($request->get('password')) {
            $user->password = Hash::make($request->get('password'));
        }
        $user->save();
        return redirect(route('profile.index'))->with('success', 'Profil mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}