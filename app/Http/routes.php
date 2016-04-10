<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('forums', ['as' => 'forums', 'uses' => 'ForumController@index']);

Route::get('forums/{forums}', ['as' => 'show_forum', 'uses' => 'ForumController@show']);
Route::get('forums/{forums}/create', ['as' => 'create_thread', 'uses' => 'ThreadController@create']);


Route::get('forums/{forums}/{threads}', ['as' => 'show_thread', 'uses' => 'ThreadController@show']);

Route::post('forums/{forums}/{threads}', 'PostController@store');
Route::post('forums/{forums}', 'ThreadController@store');



// Route::resource('/forums', 'ForumController');
// Route::resource('/threads', 'ThreadController');
// Route::resource('/posts', 'PostController');