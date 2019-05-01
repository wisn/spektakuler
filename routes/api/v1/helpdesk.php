<?php

function helpdeskRouter($router) {
    $router->group(['namespace' => 'Helpdesk'], function () use ($router) {
        $router->get('/', function () use ($router) {
            return 'HelpdeskRouter';
        });
    });
}
