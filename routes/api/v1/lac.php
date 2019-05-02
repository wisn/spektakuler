<?php

function languageCenterRouter($router) {
    $router->group(['namespace' => 'LanguageCenter'], function () use ($router) {
          $router->get('/', function () use ($router) {
              return 'LanguageCenterRouter';
          });
    });
}
