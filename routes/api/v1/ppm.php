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
            $router->get('/add', 'StaffController@add');
            $router->get('/{username}', 'StaffController@get');
            $router->get('/{username}/edit', 'StaffController@edit');
            $router->get('/{username}/remove', 'StaffController@remove');
        });
        
        $router->group(['prefix' => 'evaluator'], function () use ($router) {
            $router->get('/', function () {
                return 'PPM | Evaluator';
            });
            $router->get('/add', 'EvaluatorController@add');
            $router->get('/{username}', 'EvaluatorController@get');
            $router->get('/{username}/edit', 'EvaluatorController@edit');
            $router->get('/{username}/remove', 'EvaluatorController@remove');
        });

        $router->group(['prefix' => 'event'], function () use ($router) {
            $router->get('/', function () {
                return 'PPM | Event';
            });
            $router->get('/', 'EventController@list');
            $router->get('/list', 'EventController@list');
            $router->get('/add', 'EventController@add');
            $router->get('/{id_event}', 'EventController@get');
            $router->get('/{id_event}/edit', 'EventController@edit');
            $router->get('/{id_event}/remove', 'EventController@remove');
        }); 

        $router->group(['prefix' => 'paper'], function () use ($router) {
            $router->get('/', function () {
                return 'PPM | Paper';
            });
            $router->get('/', 'PaperController@list');
            $router->get('/list', 'PaperController@list');
            $router->get('/list/status/{status}', 'PaperController@listByStatus');
            $router->get('/list/event/{id_event}', 'PaperController@listByEvent');
            $router->get('/add', 'PaperController@add');
            $router->get('/{id_paper}', 'PaperController@get');
            $router->get('/{id_paper}/edit', 'PaperController@edit');
            $router->get('/{id_paper}/changeStatus', 'PaperController@changeStatus');
            $router->get('/{id_paper}/remove', 'PaperController@remove');

            $router->get('/{id_paper}/subwriter', 'SubwriterController@listByPaper');
            $router->get('/{id_paper}/subwriter/list', 'SubwriterController@listByPaper');
            $router->get('/{id_paper}/subwriter/add/{nim_mahasiswa}', 'SubwriterController@add');
            $router->get('/{id_paper}/subwriter/{nim_mahasiswa}/remove', 'SubwriterController@remove');

            $router->get('/{id_paper}/review', 'ReviewController@listByPaper');
            $router->get('/{id_paper}/review/list', 'ReviewController@listByPaper');
            $router->get('/{id_paper}/review/add/{id_evaluator}', 'ReviewController@add');
            $router->get('/{id_paper}/review/{id_evaluator}/edit', 'ReviewController@edit');
            $router->get('/{id_paper}/review/{id_evaluator}/remove', 'ReviewController@remove');
        });
    });
}
