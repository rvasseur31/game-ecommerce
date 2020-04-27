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
    return redirect(route('welcome'));
});

Route::get('/accueil', 'PublicController@allGames')->name('welcome');
Route::get('/platform/{id}', 'PublicController@gamePerPlatform')->name('platform');
Route::get('/product/{id}', 'PublicController@product')->name('product');
Route::post('/favorite', 'GameLikedByUserController@favorite')->name('favorite');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin-customer-review', 'CustomerReviewController');
Route::post('/admin-customer-review/{id}', 'CustomerReviewController@confirmCustomerReview')->name('admin-customer-review.confirmCustomerReview');

Route::resource('admin-platform', 'PlatformController');

Route::resource('/profile', "ProfileController");

Route::resource('/admin-user', "UserController");

Route::get('/admin-game/create/one', "GamePlatformController@createStepOne");
Route::post('/admin-game/create/one', "GamePlatformController@postStepOne")->name('admin-game.store-step-one');
Route::get('/admin-game/create/two', "GamePlatformController@createStepTwo");
Route::resource('/admin-game', "GamePlatformController");

Route::get('/invoice', function () {
    $pdf = PDF::loadView('pdf.invoice');
    return $pdf->download('invoice.pdf');
});

Route::get('/invoice-pdf', function () {
    $pdf = PDF::loadView('invoice-pdf');
    return $pdf->download('invoice.pdf');
});

