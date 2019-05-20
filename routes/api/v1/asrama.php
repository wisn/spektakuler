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

            $router->get('/list/{id_gedung}/kamar/sr', 'GedungController@listKamarSr');

            $router->get('/list/{id_gedung}/kamar/mahasiswa', 'GedungController@listKamarMahasiswa');

            $router->get('/list/{id_gedung}/sr', 'GedungController@listSr');

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

        $router->group(['prefix' => 'sr'], function () use ($router) {
            $router->get('/list', 'SeniorResidenceController@list');

            $router->get('/list/assigned', 'SeniorResidenceController@listAssigned');

            $router->get('/list/unassigned', 'SeniorResidenceController@listUnassigned');

            $router->post('/new', 'SeniorResidenceController@new');

            $router->get('/{id_sr}/show', 'SeniorResidenceController@show');

            $router->put('/{id_sr}/update', 'SeniorResidenceController@update');

            $router->delete('/{id_sr}/remove', 'SeniorResidenceController@remove');

            $router->post('/login', 'SeniorResidenceController@login');
        });

        $router->group(['prefix' => 'mahasiswa'], function () use ($router) {
            $router->get('/list', 'MahasiswaController@list');

            $router->get('/{id_mahasiswa}/show', 'MahasiswaController@show');

            $router->post('/login', 'MahasiswaController@login');
        });

        $router->group(['prefix' => 'penghuni'], function () use ($router) {
            $router->get('/list', 'PenghuniController@list');

            $router->post('/new', 'PenghuniController@new');

            $router->delete('/{id_mahasiswa}/remove', 'PenghuniController@remove');

            $router->get('/kamar/{id_mahasiswa}', 'PenghuniController@showKamar');
        });

        $router->group(['prefix' => 'pendamping'], function () use ($router) {
            $router->get('/list', 'PendampingController@list');

            $router->post('/new', 'PendampingController@new');

            $router->get('/{id_sr}/list', 'PendampingController@listBySr');

            $router->delete('/{id_sr}/{id_kamar}/remove', 'PendampingController@remove');
        });
    });
}
