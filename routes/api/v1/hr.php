<?php

function humanResourceRouter($router) {
    $router->group(['namespace' => 'HumanResource'], function () use ($router) {
        $router->get('/', function () use ($router) {
            return 'HumanResourceRouter';
        });
    });
}
