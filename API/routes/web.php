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
    $router->get('items/sort',  ['uses' => 'ItemController@selectSort']);
    $router->get('item/{id}', ['uses' => 'ItemController@select']);
    $router->post('item', ['uses' => 'ItemController@create']);
    $router->delete('item/{id}', ['uses' => 'ItemController@delete']);
    $router->put('item/{id}', ['uses' => 'ItemController@update']);

    $router->get('elements',  ['uses' => 'ElementController@selectAll']);
    $router->get('element/{id}', ['uses' => 'ElementController@select']);
    $router->post('element', ['uses' => 'ElementController@create']);
    $router->delete('element/{id}', ['uses' => 'ElementController@delete']);
    $router->put('element/{id}', ['uses' => 'ElementController@update']);

    $router->get('types',  ['uses' => 'TypeController@selectAll']);
    $router->get('type/{id}', ['uses' => 'TypeController@select']);
    $router->post('type', ['uses' => 'TypeController@create']);
    $router->delete('type/{id}', ['uses' => 'TypeController@delete']);
    $router->put('type/{id}', ['uses' => 'TypeController@update']);

    $router->get('weapons',  ['uses' => 'WeaponController@selectAll']);
    $router->get('weapon/{id}', ['uses' => 'WeaponController@select']);
    $router->post('weapon', ['uses' => 'WeaponController@create']);
    $router->delete('weapon/{id}', ['uses' => 'WeaponController@delete']);
    $router->put('weapon/{id}', ['uses' => 'WeaponController@update']);
});
