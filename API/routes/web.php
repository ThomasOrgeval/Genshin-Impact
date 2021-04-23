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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('characters',  ['uses' => 'CharacterController@showAllChars']);
    $router->get('character/{id}', ['uses' => 'CharacterController@showOneChar']);
    $router->post('character', ['uses' => 'CharacterController@create']);
    $router->delete('character/{id}', ['uses' => 'CharacterController@delete']);
    $router->put('character/{id}', ['uses' => 'CharacterController@update']);

    $router->get('items',  ['uses' => 'ItemController@selectAll']);
    $router->get('item/{id}', ['uses' => 'ItemController@select']);
    $router->post('item', ['uses' => 'ItemController@create']);
    $router->delete('item/{id}', ['uses' => 'ItemController@delete']);
    $router->put('item/{id}', ['uses' => 'ItemController@update']);
});
