<?php

function ppmRouter($router) {
    $router->group(['namespace' => 'Ppm'], function () use ($router) {
        $router->get('/', function () use ($router) {
            return 'PpmRouter';
        });

        $router->group(['prefix' => 'paper'], function () use ($router) {
            $router->get('/', 'PaperController@list');
            $router->get('/list', 'PaperController@list');
            $router->get('/list/status/{status}', 'PaperController@listByStatus');
            $router->get('/list/event/{event}', 'PaperController@listByEvent');
        });
        
        $router->group(['prefix' => 'event'], function () use ($router) {
            $router->get('/', 'EventController@list');
            $router->get('/list', 'EventController@list');
        }); 
    });
}
