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
            $router->put('/{nip_staff}/updateStaff', 'StaffController@updateStaff');
            $router->delete('/{nip_staff}/removeStaff', 'StaffController@removeStaff');
        });
        $router->group(['prefix' => 'Admin'], function () use ($router) {
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
            $router->post('/newCuti', 'CutiController@newCuti');            
        });
        $router->group(['prefix' => 'View'], function () use ($router) {
             $router->get('/HR', 'ViewController@index'); 
             $router->get('/HR/{nip_dosen}', 'ViewController@search');
        });                              
    });
}
