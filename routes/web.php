<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', 'PublicController@allGames');
Route::get('/platform/{id}', 'PublicController@gamePerPlatform')->name('platform');
Route::get('/product/{id}', 'PublicController@product')->name('product');
Route::post('/favorite', 'GameLikedByUserController@favorite')->name('favorite');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('customer-review', 'CustomerReviewController');

Route::resource('admin-platforms', 'PlatformController');

Route::resource('/profile', "ProfileController");

Route::resource('/admin-game', "GamePlatformController");




//compte: toto@gmail.com -> totoynov31