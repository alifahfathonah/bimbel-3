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
    // API untuk user //
    $router->post('users/login', ['uses' => 'UserController@loginUser']);
    $router->post('users/register', ['uses' => 'UserController@registerUser']);
    $router->get('users/list', ['uses' => 'UserController@listUser']);
    $router->get('users/aktivasi/{userid}', ['uses' => 'UserController@aktivasiUser']);
    // End API user //

    // API subjects (mata pelajaran) //
    $router->get('subjects', ['uses' => 'SubjectController@listAll']);
    $router->post('subjects/insert', ['uses' => 'SubjectController@addChapter']);
    $router->get('subjects/delete/{chapterid}', ['uses' => 'SubjectController@deleteChapter']);
    $router->post('subjects/edit', ['uses' => 'SubjectController@editChapter']);
    // End //

    // API Exercises (Latihan) //
    $router->get('exercises', ['uses' => 'ExercisesController@listAll']);
    $router->post('exercises/insert', ['uses' => 'ExercisesController@addExercise']);
    $router->get('exercises/delete/{exerciseid}', ['uses' => 'ExercisesController@deleteExercise']);
    // END //

    // API Results (jawaban siswa) //
    $router->get('results/guru/{exerciseid}', ['uses' => 'ResultsController@listAllGuru']);
    $router->get('results/siswa/{siswaid}/{exerciseid}', ['uses' => 'ResultsController@listAllSiswa']);
    $router->post('results/insert', ['uses' => 'ResultsController@addResult']);
    $router->post('results/addnilai', ['uses' => 'ResultsController@addNilai']);
    // END //
});
