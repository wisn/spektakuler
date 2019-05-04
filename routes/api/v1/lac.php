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
      $router->get('getAll', 'MahasiswaController@getAllMahasiswa');
      $router->get('get/{nim}', 'MahasiswaController@getMahasiswa');
      $router->get('add/{nim}/{nama}', 'MahasiswaController@addMahasiswa');
      $router->get('edit/{nim}/{nama}', 'MahasiswaController@editMahasiswa');
      $router->get('delete/{nim}', 'MahasiswaController@deleteMahasiswa');
    });

    $router->group(['prefix' => 'dosen'], function() use ($router) {
      $router->get('/', function() {
        return 'This is LaC Dosen';
      });
      $router->get('getAll', 'DosenController@getAllDosen');
      $router->get('get/{nip}', 'DosenController@getDosen');
      $router->get('add/{nip}/{nama}', 'DosenController@addDosen');
      $router->get('edit/{nip}/{nama}', 'DosenController@editDosen');
      $router->get('delete/{nip}', 'DosenController@deleteDosen');
    });

    $router->group(['prefix' => 'nilai'], function() use ($router) {
      $router->get('/', function() {
        return 'This is LaC Nilai';
      });
      $router->get('getNilai', 'NilaiController@getNilai');
    });
  });
}