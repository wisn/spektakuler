<?php

function humanResourceRouter($router) {
    $router->group(['namespace' => 'HumanResource'], function () use ($router) {
    	$router->group(['prefix' => 'Dosen'], function () use ($router) {
            $router->get('/ShowDosen', 'DosenController@index');
            $router->get('/Show/{nip_dosen}', 'DosenController@findDosen');
            $router->post('/newDosen', 'DosenController@newDosen');
            $router->put('/{nip_dosen}/updateDosen', 'DosenController@updateDosen');
            $router->delete('/{nip_dosen}/removeDosen', 'DosenController@removeDosen');
        });
    	$router->group(['prefix' => 'Fakultas'], function () use ($router) {
    		$router->get('/ShowFakultas','FakultasController@index');
        });        
        $router->group(['prefix' => 'Staff'], function () use ($router) {
            $router->get('/ShowStaff', 'StaffController@index');
            $router->get('/Show/{nip_staff}', 'StaffController@findStaff');
            $router->post('/newStaff', 'StaffController@newDosen');
            $router->put('/{nip_staff}/updateStaff', 'StaffController@updateDosen');
            $router->delete('/{nip_staff}/removeStaff', 'StaffController@removeStaff');
        });
    });
}
