<?php

function AsramaRouter($router) {
    $router->group(['namespace' => 'Asrama'], function () use ($router) {
        $router->group(['prefix' => 'gedung'], function () use ($router) {
            $router->get('/list', 'GedungController@list');

            $router->get('/list/putra', 'GedungController@listPutra');

            $router->get('/list/putri', 'GedungController@listPutri');

            $router->post('/new', 'GedungController@new');

            $router->put('/{nama}/update', 'GedungController@update');

            $router->delete('/{nama}/remove', 'GedungController@remove');
        });

        $router->group(['prefix' => 'kamar'], function () use ($router) {
            $router->get('/list', 'KamarController@list');

            $router->get('/list/available', 'KamarController@listAvailable');

            $router->post('/new', 'KamarController@new');

            $router->put('/{id_kamar}/update', 'KamarController@update');

            $router->delete('/{id_kamar}/remove', 'KamarController@remove');
        });

        $router->group(['prefix' => 'pendamping'], function () use ($router) {
            $router->get('/{nim}/assigned', 'PendampingController@assigned');
        });

        $router->group(['prefix' => 'penghuni'], function () use ($router) {
            $router->get('/{nim}/assigned', 'PenghuniController@assigned');
        });
    });
}
