<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * PATTERNS
 *
 * ALL id params must be integer
 */
Route::pattern('id', '[0-9]+');

/**
 * HOME
 */
Route::get('/', [
    'as'     => 'home',
    'uses'   => 'HomeController@index'
]);

/**
 * VOTE
 */
Route::get('/vote/{id}', [
    'as'         => 'vote',
    'middleware' => 'connected',
    'uses'       => 'VoteController@index'
]);

/**
 * GROUP - USER
 */
Route::group(['prefix' => 'user'], function()
{
    // GET SUBSCRIBE
    Route::get('subscribe', [
        'as'    => 'user.subscribe',
        'uses'  => 'UserController@subscribe'
    ]);

    // POST SUBSCRIBE
    Route::post('subscribe', 'UserController@createAccount');

    // GET LOGIN
    Route::get('login', [
        'as'    => 'user.login',
        'uses'  => 'UserController@login'
    ]);

    // POST SUBSCRIBE
    Route::post('login', 'UserController@connect');

    // GET LOGOUT
    Route::get('logout', [
        'as'    => 'user.logout',
        'uses'  => 'UserController@logout'
    ]);
    
});

/**
 * GROUP STATS
 */
Route::group(['prefix' => 'stats'], function()
{
    // GET SUBSCRIBE
    Route::get('online', [
        'as'    => 'stats.online',
        'uses'  => 'StatsController@online'
    ]);

});
