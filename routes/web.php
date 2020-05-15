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
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('/', 'PublicController@index')->name('index');
Route::get('/platform/{id}', 'PublicController@gamePerPlatform')->name('platform');
Route::get('/product/{id}', 'PublicController@product')->name('product');
Route::post('/favorite', 'GameLikedByUserController@favorite')->name('favorite');

// Route de connexion
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::post('/add-to-cart/{id}', 'PublicController@addToCart')->name('addToCart');
Route::post('/remove-to-cart/{id}', 'PublicController@removeToCart')->name('removeToCart');
Route::get('/shopping-bag', 'PublicController@shoppingBag');

Route::get('/invoice/{user_id}/{order_id}', 'PublicController@userInvoice');
Route::get('/mail/{user_id}/{order_id}', 'PublicController@sendEmail')->name('sendMail');

Route::post('/search', 'PublicController@searchGame');

Route::group(['middleware' => 'auth'], function () {
    // Profile user lambda
    Route::resource('/profile', 'ProfileController')->only([
        'index', 'update'
    ]);

    Route::resource('/order', 'OrderController')->only([
        'store'
    ]);

    Route::resource('customer-review', 'CustomerReviewController')->only([
        'store', 'update'
    ]);

    Route::prefix('admin')->name('admin-')->middleware('admin')->group(function() {
        // Access to dashboard
        Route::get('dashboard', 'DashboardController@index');
    
        // Crud Game
        Route::get('game/create/one', 'GamePlatformController@createStepOne')->name('game.create-step-one');
        Route::post('game/create/one', 'GamePlatformController@postStepOne')->name('game.store-step-one');
        Route::get('game/create/two', 'GamePlatformController@createStepTwo')->name('game.create-step-one');
        Route::resource('game', 'GamePlatformController');
    
        // Crud Platform
        Route::resource('platform', 'PlatformController')->except([
            'show'
        ]);
    
        // Crud User
        Route::resource('user', 'UserController')->only([
            'index', 'update', 'destroy', 'edit', 'index'
        ]);
    
        // Crud Customer review
        Route::resource('customer-review', 'CustomerReviewController');
        Route::post('customer-review/{id}', 'CustomerReviewController@confirmCustomerReview')->name('customer-review.confirmCustomerReview');
    
        // Crud Order
        Route::resource('/order', 'OrderController')->only([
            'index'
        ]);
    }); 
});