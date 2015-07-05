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
 * NEWS
 */
Route::get('/news/{slug}', [
    'as'         => 'news',
    'uses'       => 'HomeController@news'
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
 * SHOP
 */
Route::get('shop', [
    'as'         => 'shop',
    'middleware' => 'connected',
    'uses'       => 'ShopController@index'
]);

/**
 * SHOP
 */
Route::get('shop/category/{id}', [
    'as'         => 'shop.category',
    'middleware' => 'connected',
    'uses'       => 'ShopController@category'
]);

/**
 * SHOP ADD CART
 */
Route::get('shop/add/{id}', [
    'as'         => 'shop.add',
    'middleware' => 'connected',
    'uses'       => 'ShopController@addToCart'
]);

/**
 * SHOP REMOVE CART
 */
Route::get('shop/remove/{id}', [
    'as'         => 'shop.remove',
    'middleware' => 'connected',
    'uses'       => 'ShopController@removeToCart'
]);

/**
 * SHOP SUMMARY
 */
Route::get('shop/summary', [
    'as'         => 'shop.summary',
    'middleware' => 'connected',
    'uses'       => 'ShopController@summary'
]);

/**
 * SHOP SUMMARY
 */
Route::post('shop/summary', [
    'as'         => 'shop.summary',
    'middleware' => 'connected',
    'uses'       => 'ShopController@buy'
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
    Route::get('players-online', [
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
 * GROUP DATABASE
 */
Route::group(['prefix' => 'database'], function()
{
    // GET ITEM
    Route::get('item/{id}', [
        'as'    => 'database.item',
        'uses'  => 'DatabaseController@item'
    ]);
});

/**
 * GROUP PAGE
 */
Route::group(['prefix' => 'page'], function()
{

    // GET joinus
    Route::get('joins-us', [
        'as'    => 'page.joins-us',
        'uses'  => 'PageController@joinUs'
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

    // GET team
    Route::get('rates-of-server', [
        'as'    => 'page.rates',
        'uses'  => 'PageController@rates'
    ]);

    // GET error
    Route::get('error', [
        'as'    => 'page.error',
        'uses'  => 'PageController@error'
    ]);

});

/**
 * GROUP DATABASE
 */
Route::group(['prefix' => 'admin'], function()
{
    // GET ADMIN
    Route::get('home', [
        'as'            => 'admin',
        'middleware'    => 'connected',
        'uses'          => 'AdminController@index'
    ]);
});
