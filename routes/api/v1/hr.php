<?php

function humanResourceRouter($router) {
    $router->group(['namespace' => 'HumanResource'], function () use ($router) {
        $router->group(['prefix' => 'staff'], function () use ($router) {
            $router->get('/list', 'StaffController@list');
            $router->post('/login', 'StaffController@login');
        });
    });
}
