<?php

use Src\Router\Router;
$route = new Router($_SERVER['REQUEST_URI']);

// HomeController
$route->add('/error-{id}', 'HomeController@not_found');
$route->add('/', 'HomeController@index');

// UserController
$route->add('/login', 'UserController@login');
$route->add('/connect', 'UserController@connect');
$route->add('/sign-up', 'UserController@sign_up');
$route->add('/user/{id}', 'UserController@profile');
$route->add('/user/{id}/edit', 'UserController@edit');
$route->add('/user/{id}/update', 'UserController@update');
$route->add('/user/{id}/delete', 'UserController@delete');
$route->add('/user/create', 'UserController@register');
$route->add('/disconnect', 'UserController@disconnect');
$route->add_middleware('UserController',['edit', 'delete'],'auth');

// $route->print_all_routes();
$route->load();