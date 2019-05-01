<?php

function alumniRouter($router) {
    $router->group(['namespace' => 'Alumni'], function () use ($router) {
        $router->get('/', function () use ($router) {
            return 'AlumniRouter';
        });
    });
}
