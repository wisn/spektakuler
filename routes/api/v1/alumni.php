<?php

function alumniRouter($router) {
    $router->group(['namespace' => 'Alumni'], function () use ($router) {
        $router->group(['prefix' => 'Alumni'], function () use ($router) {
            $router->get('/ShowAlumni', 'AlumniController@index');
        });
    });
}
