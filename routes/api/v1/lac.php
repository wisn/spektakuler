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

    $router->group(['prefix' => 'ruangan'], function() use ($router) {
      $router->get('/', function() {
        return 'This is LaC Ruangan';
      }); 
      $router->get('getAll', 'RuanganController@getAllRuangan');
      $router->get('get/{noruang}', 'RuanganController@getRuangan');
      $router->get('add/{noruang}/{kapasitas}', 'RuanganController@addRuangan');
      $router->get('edit/{noruang}/{kapasitas}', 'RuanganController@editRuangan');
      $router->get('delete/{noruang}', 'RuanganController@deleteRuangan');
    });

    $router->group(['prefix' => 'history'], function() use ($router) {
      $router->get('/', function() {
        return 'This is LaC History Ujian';
      });
      $router->get('getAll', 'HistoryController@getAllHistory');
      $router->get('get/{id}', 'HistoryController@getHistory');
      $router->get('getNIM/{NIM}', 'HistoryController@getHistoryNIM');
      $router->get('add/{NIM}/{Nama}/{Tgl_Test}/{Tgl_Daftar}/{Tipe_Test}/{Tipe_Peserta}/{Ruangan}/{status_bayar}/{status_setuju}', 'HistoryController@addHistory');
      $router->get('edit/{id}/{status_bayar}/{status_setuju}', 'HistoryController@editHistory');
      $router->get('delete/{id}', 'HistoryController@deleteHistory');
    });

    $router->group(['prefix' => 'membership'], function() use ($router) {
      $router->get('/', function() {
        return 'This is LaC Keanggotaan';
      });
      $router->get('getAll', 'MembershipController@getAllMembership');
      $router->get('get/{NIM}', 'MembershipController@getMembership');
      $router->get('add/{NIM}/{Nama}/{status}/{expire}/{payment}', 'MembershipController@addMembership');
      $router->get('edit/{NIM}/{Status}/{expire}/{pembayaran}', 'MembershipController@editMembership');
      $router->get('delete/{NIM}', 'MembershipController@deleteMembership');
    });

    $router->group(['prefix' => 'listujian'], function() use ($router) {
      $router->get('/', function() {
        return 'This is LaC list Ujian';
      });
      $router->get('getAll', 'ListUjianController@getAllListUjian');
      $router->get('get/{id}', 'ListUjianController@getListUjian');
      $router->get('add/{nama}/{tipe}/{biaya}', 'ListUjianController@addListUjian');
      $router->get('edit/{id}/{nama}/{tipe}/{biaya}', 'ListUjianController@editListUjian');
      $router->get('delete/{id}', 'ListUjianController@deleteListUjian');
    });

    $router->group(['prefix' => 'nilai'], function() use ($router) {
      $router->get('/', function() {
        return 'This is LaC Nilai';
      });
      $router->get('getAll', 'NilaiController@getAllNilai');
      $router->get('get/{id}', 'NilaiController@getNilai');
      $router->get('getNIM/{NIM}', 'NilaiController@getNilaiNIM');
      $router->get('add/{tgl_test}/{tipe}/{NIM}/{Nama}/{peserta}/{Ruangan}/{Nilai_Total}/{Jenis_Nilai}', 'NilaiController@addNilai');
      $router->get('edit/{id}/{Nilai_Total}', 'NilaiController@editNilai');
      $router->get('delete/{id}', 'NilaiController@deleteNilai');
    });
  });
}