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

        $router->group(['prefix' => 'Dekan'], function () use ($router) {
            $router->get('/ShowDekan', 'DekanController@index');

            $router->get('/ShowDekan/{idDekan}', 'DekanController@findDekan');

            $router->post('/newDekan', 'DekanController@newDekan');

            $router->put('/{idDekan}/updateDekan', 'DekanController@updateDekan');

            $router->delete('/{idDekan}/removeDekan', 'DekanController@removeDekan');
        });

        $router->group(['prefix' => 'Admin'], function () use ($router) {
            $router->get('/ShowAdmin', 'AdminAlumniController@index');

            $router->get('/ShowAdmin/{idAdmin}', 'AdminAlumniController@findAdmin');

            $router->post('/newAdmin', 'AdminAlumniController@newAdmin');

            $router->put('/{idAdmin}/updateAdmin', 'AdminAlumniController@updateAdmin');

            $router->delete('/{idAdmin}/removeAdmin', 'AdminAlumniController@removeAdmin');
        });


        $router->group(['prefix' => 'Question'], function () use ($router) {
            $router->get('/ShowQuestion', 'QuestionController@index');

            $router->get('/ShowQuestion/{id_question}', 'QuestionController@findQuestion');

            $router->post('/newQuestion', 'QuestionController@newQuestion');

            $router->put('/{id_question}/updateQuestion', 'QuestionController@updateQuestion');

            $router->delete('/{id_question}/removeQuestion', 'QuestionController@removeQuestion');
        });


        $router->group(['prefix' => 'Jawaban'], function () use ($router) {
            $router->get('/ShowJawaban', 'JawabanController@index');

            $router->get('/ShowJawaban/{id_Jawaban}', 'JawabanController@findJawaban');

            $router->post('/newJawaban', 'JawabanController@newJawaban');

            $router->put('/{id_Jawaban}/updateJawaban', 'JawabanController@updateJawaban');

            $router->delete('/{id_Jawaban}/removeJawaban', 'JawabanController@removeJawaban');
        });



    });
}
