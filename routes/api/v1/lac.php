<?php

function languageCenterRouter($router) {
  $router->group(['namespace' => 'LanguageCenter'], function() use ($router) {
    $router->get('/', function() {
      return 'This is LaC Routing';
    });

    $router->group(['prefix' => 'mahasiswa'], function() use ($router) {
      $router->get('/', function() {
        return 'This is LaC Mahasiswa';
      });
      $router->get('getMahasiswa', 'MahasiswaController@getMahasiswa');
    });

    $router->group(['prefix' => 'nilai'], function() use ($router) {
      $router->get('/', function() {
        return 'This is LaC Nilai';
      });
      $router->get('getNilai', 'NilaiController@getNilai');
    });
  });
}