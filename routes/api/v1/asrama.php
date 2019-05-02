<?php

function AsramaRouter($router) {
    $router->group(['namespace' => 'Asrama'], function () use ($router) {
        $router->get('/', function () use ($router) {
            return 'AsramaRouter';
        });
    });
}
