<?php

use Src\Router\Router;
$route = new Router($_SERVER['REQUEST_URI']);

// HomeController
$route->add('/error-{id}', 'HomeController@not_found');
$route->add('/', 'HomeController@index');

// DocsController
$route->add('/docs', 'DocsController@index');
$route->add('/docs/get-started', 'DocsController@install');
$route->add('/docs/utility', 'DocsController@utility');
$route->add('/docs/controller', 'DocsController@controller');
$route->add('/docs/model', 'DocsController@model');

// UserController
$route->add('/login', 'UserController@login');
$route->add('/connect', 'UserController@connect');
$route->add('/sign-up', 'UserController@sign_up');
$route->add('/reset-password', 'UserController@reset_form');
$route->add('/password-token', 'UserController@password_token');
$route->add('/update-password', 'UserController@update_password');
$route->add('/user/reset', 'UserController@reset_password');
$route->add('/users', 'UserController@list');
$route->add('/user/{id}', 'UserController@profile');
$route->add('/user/{id}/edit', 'UserController@edit');
$route->add('/user/{id}/update', 'UserController@update');
$route->add('/user/{id}/delete', 'UserController@delete');
$route->add('/user/create', 'UserController@register');
$route->add('/disconnect', 'UserController@disconnect');
$route->add_middleware('UserController',['edit', 'update', 'delete'], 'auth');

// $route->print_all_routes();
$route->load();