<?php

require_once __DIR__ . '/api/v1.php';

function apiRouter($router) {
    $router->group(['namespace' => 'Api'], function () use ($router) {
        $router->group(['prefix' => 'v1'], function () use ($router) {
            apiV1Router($router);
        });
    });
}
