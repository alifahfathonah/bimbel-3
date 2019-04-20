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

$router->group(['prefix' => 'api'], function() use ($router){
    $router->post('users/login', ['uses' => 'UserController@loginUser']);
    $router->post('users/register', ['uses' => 'UserController@registerUser']);
    $router->get('users/list', ['uses' => 'UserController@listUser']);
    $router->get('users/aktivasi/{userid}', ['uses' => 'UserController@aktivasiUser']);
    $router->get('subjects', ['uses' => 'SubjectController@listAll']);
    $router->post('subjects/insert', ['uses' => 'SubjectController@addChapter']);
    $router->get('subjects/delete/{chapterid}', ['uses' => 'SubjectController@deleteChapter']);
    $router->post('subjects/edit', ['uses' => 'SubjectController@editChapter']);
});
