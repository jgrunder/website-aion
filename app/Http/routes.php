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

$app->get('/', [
    'as' => 'home', 'uses' => 'App\Http\Controllers\HomeController@index'
]);

// USER
$app->get('user/subscribe', [
    'as' => 'subscribe', 'uses' => 'App\Http\Controllers\UserController@subscribe'
]);