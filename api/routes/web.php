<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['middleware' => 'auth'], function() use ($router){

});
/// Rutas a las apis de productos
$router->get('/productos', 'ProductController@getAll');
$router->post('/productos', 'ProductController@create');
/// Rutas a las apis de familias
$router->get('/familias', 'FamilyController@getAll');
/// Rutas a las apis de usuarios
$router->post('/users', 'UserController@create');
$router->post('/login', 'UserController@authenticate');



