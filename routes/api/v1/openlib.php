<?php

function openLibraryRouter($router) {
    $router->group(['namespace' => 'OpenLibrary'], function () use ($router) {
        $router->get('/', function () use ($router) {
            return 'OpenLibraryRouter';
        });
    });
}
