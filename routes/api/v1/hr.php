<?php

function humanResourceRouter($router) {
    $router->group(['namespace' => 'HumanResource'], function () use ($router) {
        $router->get('/', [
            'as' => 'HumanResourceIndex',
            'uses' => 'ExampleController@index',
        ]);
    });
}
