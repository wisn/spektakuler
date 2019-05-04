<?php

function alumniRouter($router) {
    $router->group(['namespace' => 'Alumni'], function () use ($router) {
        $router->group(['prefix' => 'Alumni'], function () use ($router) {
            $router->get('/ShowAlumni', 'AlumniController@index');

            $router->get('/ShowAlumni/{NIM}', 'AlumniController@findAlumni');

            $router->post('/newAlumni', 'AlumniController@newAlumni');

            $router->put('/{NIM}/updateAlumni', 'AlumniController@updateAlumni');

            $router->delete('/{NIM}/removeAlumni', 'AlumniController@removeAlumni');
        });
    });
}
