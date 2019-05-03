<?php

function languageCenterRouter($router) {
    $router->group(['namespace' => 'LanguageCenter'], function () use ($router) {
      $router->group(['prefix' => 'nilai'], function () use ($router) {
          $router->get('/list', 'NilaiController@list');

          $router->post('/new', 'GedungController@new');

          // $router->put('/{nama}/update', 'GedungController@update');

          // $router->delete('/{nama}/remove', 'GedungController@remove');
      });
    });
}
