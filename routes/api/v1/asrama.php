<?php

function AsramaRouter($router) {
    $router->group(['namespace' => 'Asrama'], function () use ($router) {
        $router->get('/', function () use ($router) {
            return 'AsramaRouter';
        });

        $router->group(['prefix' => 'gedung'], function () use ($router) {
            $router->get('/list', 'GedungController@list');
        });
    });
}
