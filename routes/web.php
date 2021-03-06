<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// API route group
$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->get('/', 'UserController@users');
        $router->get('/me', 'UserController@me');
        $router->get('/{id}', 'UserController@user');

        $router->post('register', 'AuthController@register');
        $router->post('login', 'AuthController@login');
        $router->post('logout', 'AuthController@logout');
        $router->post('refresh', 'AuthController@refresh');
    });

    $router->group(['prefix' => 'applications'], function () use ($router) {
        $router->get('/', 'ApplicationController@applications');
        $router->get('/current', 'ApplicationController@current');
        $router->get('/{id}', 'ApplicationController@application');

        $router->post('register', 'AuthApplicationController@register');
        $router->post('login', 'AuthApplicationController@login');
        $router->post('logout', 'AuthApplicationController@logout');
        $router->post('refresh', 'AuthApplicationController@refresh');
    });
});
