<?php

function AsramaRouter($router) {
    $router->group(['namespace' => 'Asrama'], function () use ($router) {
        $router->group(['prefix' => 'staff'], function () use ($router) {
            $router->get('/list', 'StaffController@list');

            $router->post('/login', 'StaffController@login');
        });

        $router->group(['prefix' => 'gedung'], function () use ($router) {
            $router->get('/list', 'GedungController@list');

            $router->get('/list/putra', 'GedungController@listPutra');

            $router->get('/list/putri', 'GedungController@listPutri');

            $router->get('/list/{id_gedung}/kamar', 'GedungController@listKamar');

            $router->post('/new', 'GedungController@new');

            $router->get('/{id_gedung}/show', 'GedungController@show');

            $router->put('/{id_gedung}/update', 'GedungController@update');

            $router->delete('/{id_gedung}/remove', 'GedungController@remove');
        });

        $router->group(['prefix' => 'kamar'], function () use ($router) {
            $router->get('/list', 'KamarController@list');

            $router->get('/list/available', 'KamarController@listAvailable');

            $router->post('/new', 'KamarController@new');

            $router->get('/{id_kamar}/show', 'KamarController@show');

            $router->put('/{id_kamar}/update', 'KamarController@update');

            $router->delete('/{id_kamar}/remove', 'KamarController@remove');
        });

        $router->group(['prefix' => 'mahasiswa'], function () use ($router) {
            $router->get('/list', 'MahasiswaController@list');

            $router->post('/login', 'MahasiswaController@login');
        });
    });
}
