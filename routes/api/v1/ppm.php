<?php

function ppmRouter($router) {
    $router->group(['namespace' => 'Ppm'], function () use ($router) {
        $router->get('/', function () use ($router) {
            return 'PpmRouter';
        });

        $router->group(['prefix' => 'staff'], function () use ($router) {
            $router->get('/', function () {
                return 'PPM | Staff';
            });
            $router->post('/add', 'StaffController@add');
            $router->get('/{username}', 'StaffController@get');
            $router->put('/{username}/edit', 'StaffController@edit');
            $router->delete('/{username}/remove', 'StaffController@remove');
        });
        
        $router->group(['prefix' => 'evaluator'], function () use ($router) {
            $router->get('/', function () {
                return 'PPM | Evaluator';
            });
            $router->post('/add', 'EvaluatorController@add');
            $router->get('/{username}', 'EvaluatorController@get');
            $router->put('/{username}/edit', 'EvaluatorController@edit');
            $router->delete('/{username}/remove', 'EvaluatorController@remove');
        });

        $router->group(['prefix' => 'event'], function () use ($router) {
            $router->get('/', function () {
                return 'PPM | Event';
            });
            $router->get('/', 'EventController@list');
            $router->get('/list', 'EventController@list');
            $router->post('/add', 'EventController@add');
            $router->get('/{id_event}', 'EventController@get');
            $router->put('/{id_event}/edit', 'EventController@edit');
            $router->delete('/{id_event}/remove', 'EventController@remove');
        }); 

        $router->group(['prefix' => 'paper'], function () use ($router) {
            $router->get('/', function () {
                return 'PPM | Paper';
            });
            $router->get('/', 'PaperController@list');
            $router->get('/list', 'PaperController@list');
            $router->get('/list/status/{status}', 'PaperController@listByStatus');
            $router->get('/list/event/{id_event}', 'PaperController@listByEvent');
            $router->post('/add', 'PaperController@add');
            $router->get('/{id_paper}', 'PaperController@get');
            $router->put('/{id_paper}/edit', 'PaperController@edit');
            $router->put('/{id_paper}/verify/{id_staff}', 'PaperController@verify');
            $router->put('/{id_paper}/changeStatus', 'PaperController@changeStatus');
            $router->delete('/{id_paper}/remove', 'PaperController@remove');

            $router->get('/subwriter/{nim_mahasiswa}', 'SubwriterController@listByMahasiswa');

            $router->get('/{id_paper}/subwriter', 'SubwriterController@listByPaper');
            $router->get('/{id_paper}/subwriter/list', 'SubwriterController@listByPaper');
            $router->post('/{id_paper}/subwriter/add/{nim_mahasiswa}', 'SubwriterController@add');
            $router->delete('/{id_paper}/subwriter/{nim_mahasiswa}/remove', 'SubwriterController@remove');

            $router->get('/{id_paper}/review', 'ReviewController@listByPaper');
            $router->get('/{id_paper}/review/list', 'ReviewController@listByPaper');
            $router->post('/{id_paper}/review/add/{id_evaluator}', 'ReviewController@add');
            $router->put('/{id_paper}/review/{id_evaluator}/edit', 'ReviewController@edit');
            $router->delete('/{id_paper}/review/{id_evaluator}/remove', 'ReviewController@remove');
        });
    });
}
