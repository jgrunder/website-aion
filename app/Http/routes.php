<?php

use App\Http\Controllers\Admin;

/**
 * PATTERNS
 *
 */
Route::pattern('id', '[0-9]+');
Route::pattern('playerId', '[0-9]+');
Route::pattern('AccountId', '[0-9]+');

/**
 * ROUTES
 */
Route::get('/', ['as' => 'home', 'uses'   => 'HomeController@index']);
Route::get('/reset-password/{token}/{name}', ['as' => 'resetpassword', 'uses' => 'LostPasswordController@reset']);
Route::get('/news/{slug}/{id}', ['as' => 'news', 'uses' => 'HomeController@news']);
Route::get('/vote/{id}', ['as' => 'vote', 'uses' => 'VoteController@index'])->middleware('connected');
Route::get('/language/{language}', ['as' => 'language', 'uses' => 'LanguageController@change']);
Route::get('donation', ['as' => 'donation', 'uses' => 'PageController@donation'])->middleware('connected');

/** Shop */
Route::group(['prefix' => 'shop', 'middleware' => ['connected']], function() {
    Route::get('', ['as' => 'shop', 'uses' => 'ShopController@index']);
    Route::get('category/{id}', ['as' => 'shop.category', 'uses' => 'ShopController@category']);
    Route::get('add/{id}', ['as' => 'shop.add', 'uses' => 'ShopController@addToCart']);
    Route::get('remove/{id}', ['as' => 'shop.remove', 'uses' => 'ShopController@removeToCart']);
    Route::get('summary/', ['as' => 'shop.summary', 'uses' => 'ShopController@summary']);
    Route::post('summary', ['as' => 'shop.summary', 'uses' => 'ShopController@buy']);
});

/** Paiement */
Route::get('allopass', ['as' => 'allopass', 'uses' => 'PaiementController@allopass'])->middleware('connected');
Route::get('allopass/success', ['as' => 'allopass.success', 'uses' => 'PaiementController@allopassSuccess'])->middleware('connected');
Route::get('paypal', ['as' => 'paypal', 'uses' => 'PaiementController@paypal'])->middleware('connected');
Route::post('paypal-ipn', ['as' => 'paypal.ipn', 'uses' => 'PaiementController@paypalIpn']);
Route::get('paypal-valid', ['as' => 'paypal.valid', 'uses' => 'PaiementController@paypalValid'])->middleware('connected');

/** User */
Route::group(['prefix' => 'user'], function() {
    Route::get('subscribe', ['as' => 'user.subscribe', 'uses' => 'UserController@subscribe']);
    Route::post('subscribe', 'UserController@createAccount');
    Route::post('login', 'UserController@connect');
    Route::get('logout', ['as' => 'user.logout', 'uses' => 'UserController@logout']);
    Route::get('unlock/{playerId}/{accountId}', ['as' => 'user.unlock.player', 'uses'=> 'UserController@unlockPlayer']);
    Route::get('account', ['as' => 'user.account', 'uses' => 'UserController@account'])->middleware('connected');
    Route::match(['GET', 'POST'], 'edit', ['as' => 'user.account.edit', 'uses' => 'UserController@edit'])->middleware('connected');
    Route::match(['GET', 'POST'], 'lost-password', ['as' => 'user.lost_password', 'uses' => 'LostPasswordController@index']);
});

/** Stats */
Route::group(['prefix' => 'stats'], function() {
    Route::get('players-online', ['as' => 'stats.online', 'uses' => 'StatsController@online']);
    Route::get('legions', ['as' => 'stats.legions', 'uses' => 'StatsController@legions']);
    Route::get('bg', ['as' => 'stats.bg', 'uses' => 'StatsController@bg']);
});

/** Database */
Route::group(['prefix' => 'database'], function() {
    Route::get('item/{id}', ['as' => 'database.item', 'uses' => 'DatabaseController@item']);
});

/** Page */
Route::group(['prefix' => 'page'], function() {
    Route::get('joins-us', ['as' => 'page.joins-us', 'uses' => 'PageController@joinUs']);
    Route::get('teamspeak', ['as' => 'page.teamspeak', 'uses' => 'PageController@teamspeak']);
    Route::get('rules', ['as' => 'page.rules', 'uses' => 'PageController@rules']);
    Route::get('team', ['as' => 'page.team', 'uses' => 'PageController@team']);
    Route::get('rates-of-server', ['as' => 'page.rates', 'uses' => 'PageController@rates']);
    Route::get('error', ['as' => 'page.error', 'uses' => 'PageController@error']);
});

/** Admin */
Route::group(['prefix' => 'admin', 'middleware' => 'AccessLevel', 'access_level' => 6], function() {
    Route::get('home', ['as' => 'admin', 'uses' => 'Admin\NewsController@index']);
    Route::get('search', ['as' => 'admin.search', 'uses' => 'Admin\AdminController@search']);
    Route::get('news', ['as' => 'admin.news', 'uses' => 'Admin\NewsController@news']);
    Route::get('logs/{name}', ['as' => 'admin.logs', 'uses' => 'Admin\AdminController@logs']);
    Route::match(['GET', 'POST'], 'news-add', ['as' => 'admin.news.add', 'uses' => 'Admin\NewsController@newsAdd']);
    Route::match(['GET', 'POST'], 'news-edit/{id}', ['as' => 'admin.news.edit', 'uses' => 'Admin\NewsController@newEdit']);
    Route::get('news-delete/{id}', ['as' => 'admin.news.delete', 'uses' => 'Admin\NewsController@newsDelete']);
    Route::match(['GET', 'POST'], 'shop-category', ['as' => 'admin.shop.category', 'uses' => 'Admin\ShopController@shopCategory']);
    Route::match(['GET', 'POST'], 'shop-subcategory', ['as' => 'admin.shop.subcategory', 'uses' => 'Admin\ShopController@shopSubCategory']);
    Route::match(['GET', 'POST'], 'shop-add', ['as' => 'admin.shop.add', 'uses' => 'Admin\ShopController@shopAdd']);
    route::match(['GET', 'POST'], 'shop-edit/{id}', ['as' => 'admin.shop.edit', 'uses' => 'Admin\ShopController@shopEdit']);
    route::get('allopass', ['as' => 'admin.allopass', 'uses' => 'Admin\AdminController@allopass']);
    route::get('paypal', ['as' => 'admin.paypal', 'uses' => 'Admin\AdminController@paypal']);
    route::get('reals', ['as' => 'admin.reals', 'uses' => 'Admin\AdminController@reals']);
    route::match(['GET', 'POST'], 'page/{name}', ['as' => 'admin.page', 'uses' => 'Admin\AdminController@pageEdit']);
    route::match(['GET', 'POST'], 'add-reals', ['as' => 'admin.add.reals', 'uses' => 'Admin\AdminController@addReals']);
    route::match(['GET', 'POST'], 'slider', ['as' => 'admin.slider', 'uses' => 'Admin\AdminController@slider']);
    route::match(['GET', 'POST'], 'pushbullet', ['as' => 'admin.pushbullet', 'uses' => 'Admin\AdminController@pushbullet']);
});
