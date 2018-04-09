<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->post('token', ['uses' => 'CompendiumController@token']);

    $router->get('users',  ['uses' => 'UserController@index']);
    $router->get('users/{user}', ['uses' => 'UserController@show']);
    $router->post('users', ['uses' => 'UserController@create']);

    $router->post('/test/', function () use ($router) {
        return 'Only viewable with token';
    });
});