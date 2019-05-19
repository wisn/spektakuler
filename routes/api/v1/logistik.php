<?php

function logistikRouter($router) {
    $router->group(['namespace' => 'Logistik'], function () use ($router) {
        $router->get('/', function () use ($router) {
            return 'LogistikRouter';
        });
    });
}
