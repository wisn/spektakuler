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

$router->group(['prefix' => 'hr'], function () use ($router) {
    $router->group(['namespace' => 'HumanResource'], function () use ($router) {
        $router->get('/', [
            'as' => 'HumanResourceIndex',
            'uses' => 'ExampleController@index',
        ]);
    });
});
