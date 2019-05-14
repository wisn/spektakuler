<?php

function studentManagementRouter($router) {
    $router->group(['namespace' => 'StudentManagement'], function () use ($router) {
        $router->group(['prefix' => 'mahasiswa'], function () use ($router) {
            $router->get('/list', 'MahasiswaController@list');
            $router->post('/login', 'MahasiswaController@login');
            $router->get('/{username}', 'MahasiswaController@show');
        });
    });
}
