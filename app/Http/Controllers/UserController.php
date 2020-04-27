<?php

namespace App\Http\Controllers;

use App\Game_buy_by_user;
use App\Platform;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Game_liked_by_user;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.user.index')
            ->with('users', User::all())
            ->with('gameBuyByUsers', Game_buy_by_user::all())
            ->with('gameLikedByUsers', Game_liked_by_user::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user) {
        return view('admin.user.edit')
            ->with('user', User::find($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user) {
        $inputs = $request->except('_token', '_method');
        $user = User::find($user);

        $user->firstname =  $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->password = $request->get('pasword');


        foreach ($inputs as $key => $value) {
            $user->$key = $value;
        }
        $user->save();

        return redirect(route('profile.index'))->with('success', 'Utilisateur mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user) {
        User::destroy($user);
        return redirect(route('admin-user.index'))->with('success', 'Utilisateur supprimé avec succès !');
    }
}
