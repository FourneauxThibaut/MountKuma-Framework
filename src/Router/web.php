<?php

use Src\Router\Router;

$route = new Router($_SERVER['REQUEST_URI']);

$route->add('/error-{id}', 'HomeController@not_found');
$route->add('/', 'HomeController@index');

$route->add('/article/{id}', 'HomeController@show');
// $route->middleware('HomeController',['create','delete','update'],'admin');

$route->load();