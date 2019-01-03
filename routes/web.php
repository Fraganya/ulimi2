<?php

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

use App\FeedCat;
use App\SeedCat;



Route::get('/', function () use ($router) {
    if(Auth::check()){
        return redirect('home');
    }
    return view('login');
});
Route::get('login', function () use ($router) {
    if(Auth::check()){
        return redirect('home');
    }
    return view('login');
});

Route::get('check-links',function(){
	return "Getting here";
});

route::post('login',"Auth\LoginController@login")->name('login');
route::post('logout',"Auth\LoginController@logout")->name('logout');
route::post('register',"UserController@register")->name('register');

Route::middleware(['auth'])->group(function(){
    Route::get('home',function(){
        return view('home')->with([
            'feed_categories'=>FeedCat::all(),
            'seed_categories'=>SeedCat::all(),
            'feeds'=>\App\Feed::all()->count(),
            'seeds'=>\App\Seed::all()->count(),
            'users'=>\App\User::all()->count(),
            'posts'=>\App\Post::all()->count(),
            'c_page'=>"home"
        ]);
    });

    /**
     * User Management routes
     */
    Route::get('users',"UserController@index");
    Route::get('users/remove-account/{userID}',"UserController@removeAccount");
    Route::get('users/reset-password/{userID}',"UserController@resetPassword");
    Route::post('users/change-password',"UserController@changePassword");



    /*
     * Feed category routes
     */
    Route::get('feed-cats',"FeedCatController@index");
    Route::post('create-feed-cat',"FeedCatController@store");
    Route::get('feed-cats/remove/{id}',"FeedCatController@removeCat");

    /*
    * Seed category routes
    */
    Route::get('seed-cats',"SeedCatController@index");
    Route::post('create-seed-cat',"SeedCatController@store");
    Route::get('seed-cats/remove/{id}',"SeedCatController@removeCat");

    /**
     * Feed management routes
     */
    Route::get('feeds',"FeedController@index");
    Route::post('create-feed',"FeedController@store");
    Route::get('feeds/remove/{id}',"FeedController@remove");

    /**
     * Seed management routes
     */
    Route::get('seeds',"SeedController@index");
    Route::post('create-seed',"SeedController@store");
    Route::get('seeds/remove/{id}',"SeedController@remove");

    /**
     * Posts management routes
     */
    Route::get('posts',"PostController@index");
    Route::post('create-post',"PostController@store");
    Route::get('posts/remove/{id}',"PostController@remove");


    /**
     * Market management routes
     */
    Route::resource('market',"MarketItemController");


});