<?php

require_once __DIR__ . '/v1/hr.php';

function apiV1Router($router) {
    $router->group(['namespace' => 'V1'], function () use ($router) {
        $router->group(['prefix' => 'hr'], function () use ($router) {
            humanResourceRouter($router);
        });
    });
}
