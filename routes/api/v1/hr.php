<?php

function humanResourceRouter($router) {
    $router->group(['namespace' => 'HumanResource'], function () use ($router) {
    	$router->group(['prefix' => 'Dosen'], function () use ($router) {
            $router->get('/ShowDosen', 'DosenController@index');
            $router->get('/Show/{nip_dosen}', 'DosenController@findDosen');
            $router->post('/newDosen', 'DosenController@newDosen');
            $router->put('/updateDosen/{nip_dosen}', 'DosenController@updateDosen');
            $router->delete('/removeDosen/{nip_dosen}', 'DosenController@removeDosen');
            $router->get('/Showbyfakultas/{id_fakultas}', 'DosenController@findDosenFak');
        });
    	$router->group(['prefix' => 'Fakultas'], function () use ($router) {
    		$router->get('/ShowFakultas','FakultasController@index');
        });        
        $router->group(['prefix' => 'Staff'], function () use ($router) {
            $router->get('/ShowStaff', 'StaffController@index');
            $router->get('/Show/{nip_staff}', 'StaffController@findStaff');
            $router->post('/newStaff', 'StaffController@newStaff');
            $router->put('/updateStaff/{nip_staff}', 'StaffController@updateStaff');
            $router->delete('/removeStaff/{nip_staff}', 'StaffController@removeStaff');
            $router->get('/Showbyfakultas/{id_fakultas}', 'StaffController@findStaffFak');
        });
        $router->group(['prefix' => 'Admin'], function () use ($router) {
            $router->get('/Show/{nip_admin}', 'AdminController@findAdmin');
            $router->get('/ShowDosen','AdminController@ShowDosen');
            $router->get('/ShowStaff','AdminController@ShowStaff');
            $router->get('/FindDosen/{nip_dosen}', 'AdminController@findDosen');
            $router->get('/FindStaff/{nip_staff}', 'AdminController@findStaff');
            $router->post('/newDosen', 'AdminController@newDosen');
            $router->post('/newStaff', 'AdminController@newStaff');
            $router->get('/Showbyfakultas/{id_fakultas}', 'DosenController@findDosenFak');                              
        });
        $router->group(['prefix' => 'Cuti'], function () use ($router) {
            $router->get('/ShowCuti','CutiController@index');
            $router->get('/fetchCuti/{id_fakultas}','CutiController@fetchCuti');
            $router->get('/fetchCutiNIP/{nip}','CutiController@fetchCutiNIP');
            $router->post('/newCuti', 'CutiController@newCuti'); 
            $router->put('/updateCuti/{nip}','CutiController@updateCuti');           
        });
        $router->group(['prefix' => 'View'], function () use ($router) {
             $router->get('/HR', 'ViewController@index'); 
             $router->get('/HR/{nip_dosen}', 'ViewController@search');
        });
        $router->group(['prefix' => 'Absen'], function () use ($router) {
            $router->post('/newAbsen','AbsenController@newAbsen');
            $router->get('/ShowAbsen','AbsenController@index');
            $router->get('/fetchAbsen/{id_fakultas}','AbsenController@fetchAbsen');
            $router->put('/updateAbsen/{nip}','AbsenController@updateAbsen');
        });                                
    });
}
