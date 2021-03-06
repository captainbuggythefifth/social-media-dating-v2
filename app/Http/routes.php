<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    
    Route::resource("characters", "CharacterController");

    Route::get('characters/delete/{id}', [
        'as' => 'characters.delete',
        'uses' => 'CharacterController@destroy',
    ]);
});

Route::group(['middleware' => 'web'], function () {
    
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    /*Route::resource("projects", "ProjectController");

    Route::get('projects/delete/{id}', [
        'as' => 'projects.delete',
        'uses' => 'ProjectController@destroy',
    ]);*/
});


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function ()
{
    Route::group(['prefix' => 'v1'], function ()
    {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


