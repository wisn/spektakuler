<?php

function ppmRouter($router) {
    $router->group(['namespace' => 'Ppm'], function () use ($router) {
        $router->get('/', function () use ($router) {
            return 'PpmRouter';
        });
    });
}
