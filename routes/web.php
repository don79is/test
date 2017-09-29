<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', ['as' => 'app.posts.all', 'uses' => 'TestPostsController@allPostsFrontEnd']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/user', 'middleware' => ['auth', 'user-check']], function () {
    Route::get('/allPosts', ['as' => 'app.posts.index', 'uses' => 'TestPostsController@index']);
    Route::get('/post', ['as' => 'app.posts.create', 'uses' => 'TestPostsController@create']);
    Route::post('/posts', ['as' => 'app.posts.store', 'uses' => 'TestPostsController@store']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/show', ['as' => 'app.posts.show', 'uses' => 'TestPostsController@show']);
        Route::get('/', ['as' => 'app.posts.delete', 'uses' => 'TestPostsController@destroy']);
        Route::get('/edit', ['as' => 'app.posts.edit', 'uses' => 'TestPostsController@edit']);
        Route::post('/edit', ['as' => 'app.posts.update', 'uses' => 'TestPostsController@update']);
    });
});
