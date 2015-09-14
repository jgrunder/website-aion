<?php

use App\Http\Controllers\Admin;

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
Route::get('/news/{slug}/{id}', [
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
 * DONATION
 */
Route::get('donation', [
    'as'         => 'donation',
    'middleware' => 'connected',
    'uses'       => 'PageController@donation'
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
 * ALLOPASS
 */
Route::get('allopass', [
    'as'         => 'allopass',
    'middleware' => 'connected',
    'uses'       => 'PaiementController@allopass'
]);

/**
 * ALLOPASS SUCCESS
 */
Route::get('allopass/success', [
    'as'         => 'allopass.success',
    'middleware' => 'connected',
    'uses'       => 'PaiementController@allopassSuccess'
]);

/**
 * PAYPAL
 */
Route::get('paypal', [
    'as'         => 'paypal',
    'middleware' => 'connected',
    'uses'       => 'PaiementController@paypal'
]);

/**
 * PAYPAL
 */
Route::post('paypal-ipn', [
    'as'         => 'paypal.ipn',
    'uses'       => 'PaiementController@paypalIpn'
]);

/**
 * PAYPAL
 */
Route::get('paypal-valid', [
    'as'         => 'paypal.valid',
    'middleware' => 'connected',
    'uses'       => 'PaiementController@paypalValid'
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

    // GET rates
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
 * GROUP ADMIN
 */
Route::group(['prefix' => 'admin', 'middleware' => 'AccessLevel', 'access_level' => 1], function()
{
    // GET HOME
    Route::get('home', [
        'as'            => 'admin',
        'uses'          => 'Admin\NewsController@index'
    ]);

    // GET SEARCH
    Route::get('search', [
        'as'            => 'admin.search',
        'uses'          => 'AdminController@search'
    ]);

    // GET HOME
    Route::match(['GET', 'POST'], 'config', [
        'as'            => 'admin.config',
        'uses'          => 'AdminController@config'
    ]);

    // GET NEWS LIST
    Route::get('news', [
        'as'            => 'admin.news',
        'uses'          => 'Admin\NewsController@news'
    ]);

    // GET NEWS LIST
    Route::get('logs/{name}', [
        'as'            => 'admin.logs',
        'uses'          => 'AdminController@logs'
    ]);

    // GET NEWS ADD
    Route::match(['GET', 'POST'], 'news-add', [
        'as'            => 'admin.news.add',
        'uses'          => 'Admin\NewsController@newsAdd'
    ]);

    // GET NEWS EDIT
    Route::match(['GET', 'POST'], 'news-edit/{id}', [
        'as'            => 'admin.news.edit',
        'uses'          => 'Admin\NewsController@newEdit'
    ]);

    // GET NEWS DELETE
    Route::get('news-delete/{id}', [
        'as'            => 'admin.news.delete',
        'uses'          => 'Admin\NewsController@newsDelete'
    ]);

    // GET SHOP CATEGORY
    Route::match(['GET', 'POST'], 'shop-category', [
        'as'            => 'admin.shop.category',
        'uses'          => 'Admin\ShopController@shopCategory'
    ]);

    // GET SHOP SUB CATEGORY
    Route::match(['GET', 'POST'], 'shop-subcategory', [
        'as'            => 'admin.shop.subcategory',
        'uses'          => 'Admin\ShopController@shopSubCategory'
    ]);

    // GET SHOP CATEGORY
    Route::match(['GET', 'POST'], 'shop-add', [
        'as'            => 'admin.shop.add',
        'uses'          => 'Admin\ShopController@shopAdd'
    ]);

    // GET SHOP EDIT
    route::match(['GET', 'POST'], 'shop-edit/{id}', [
        'as'            => 'admin.shop.edit',
        'uses'          => 'Admin\ShopController@shopEdit'
    ]);

    // ALLOPASS
    route::get('allopass', [
        'as'            => 'admin.allopass',
        'uses'          => 'AdminController@allopass'
    ]);

    // PAGE
    route::match(['GET', 'POST'], 'page/{name}', [
        'as'            => 'admin.page',
        'uses'          => 'AdminController@pageEdit'
    ]);

});
