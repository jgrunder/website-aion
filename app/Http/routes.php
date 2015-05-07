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
 * LANGUAGE
 */
Route::get('/language/{language}', [
    'as'         => 'language',
    'uses'       => 'LanguageController@change'
]);

/**
 * GROUP - USER
 */
Route::group(['prefix' => 'user'], function()
{
    // GET SUBSCRIBE
    Route::get('subscribe', [
        'as'         => 'user.subscribe',
        'middleware' => 'unConnected',
        'uses'       => 'UserController@subscribe'
    ]);

    // POST SUBSCRIBE
    Route::post('subscribe', 'UserController@createAccount');

    // GET LOGIN
    Route::get('login', [
        'as'         => 'user.login',
        'middleware' => 'unConnected',
        'uses'       => 'UserController@login'
    ]);

    // POST SUBSCRIBE
    Route::post('login', 'UserController@connect');

    // GET LOGOUT
    Route::get('logout', [
        'as'    => 'user.logout',
        'uses'  => 'UserController@logout'
    ]);

    // GET ACCOUNT
    Route::get('account', [
        'as'         => 'user.account',
        'middleware' => 'connected',
        'uses'       => 'UserController@account'
    ]);
    
});

/**
 * GROUP STATS
 */
Route::group(['prefix' => 'stats'], function()
{
    // GET ONLINE
    Route::get('online', [
        'as'    => 'stats.online',
        'uses'  => 'StatsController@online'
    ]);

    // GET ABYSS
    Route::get('abyss', [
        'as'    => 'stats.abyss',
        'uses'  => 'StatsController@abyss'
    ]);

    // GET BG
    Route::get('bg', [
        'as'    => 'stats.bg',
        'uses'  => 'StatsController@bg'
    ]);

});

/**
 * GROUP PAGE
 */
Route::group(['prefix' => 'page'], function()
{
    // GET contactus
    Route::get('contactus', [
        'as'    => 'page.contactus',
        'uses'  => 'PageController@contactUs'
    ]);

    // GET teamspeak
    Route::get('teamspeak', [
        'as'    => 'page.teamspeak',
        'uses'  => 'PageController@teamspeak'
    ]);

    // GET rules
    Route::get('rules', [
        'as'    => 'page.rules',
        'uses'  => 'PageController@rules'
    ]);

    // GET team
    Route::get('team', [
        'as'    => 'page.team',
        'uses'  => 'PageController@team'
    ]);

});