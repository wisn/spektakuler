<?php

function studentManagementRouter($router) {
    $router->group(['namespace' => 'StudentManagement'], function () use ($router) {
        $router->get('/', function () use ($router) {
            return 'StudentManagementRouter';
        });
    });
}
