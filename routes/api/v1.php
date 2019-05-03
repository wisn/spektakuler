<?php

require_once __DIR__ . '/v1/ppm.php';
require_once __DIR__ . '/v1/asrama.php';
require_once __DIR__ . '/v1/logistik.php';
require_once __DIR__ . '/v1/sm.php';
require_once __DIR__ . '/v1/hr.php';
require_once __DIR__ . '/v1/openlib.php';
require_once __DIR__ . '/v1/helpdesk.php';
require_once __DIR__ . '/v1/lac.php';
require_once __DIR__ . '/v1/alumni.php';

function apiV1Router($router) {
    $router->group(['namespace' => 'V1'], function () use ($router) {
        $router->group(['prefix' => 'ppm'], function () use ($router) {
            ppmRouter($router);
        });

        $router->group(['prefix' => 'asrama'], function () use ($router) {
            asramaRouter($router);
        });

        $router->group(['prefix' => 'logistik'], function () use ($router) {
            logistikRouter($router);
        });

        $router->group(['prefix' => 'sm'], function () use ($router) {
            studentManagementRouter($router);
        });

        $router->group(['prefix' => 'hr'], function () use ($router) {
            humanResourceRouter($router);
        });

        $router->group(['prefix' => 'openlib'], function () use ($router) {
            openLibraryRouter($router);
        });

        $router->group(['prefix' => 'helpdesk'], function () use ($router) {
            helpdeskRouter($router);
        });

        $router->group(['prefix' => 'lac'], function () use ($router) {
            languageCenterRouter($router);
        });

        $router->group(['prefix' => 'alumni'], function () use ($router) {
            alumniRouter($router);
        });
    });
}
