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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

# has route
Route::get('posts/{hash}/edit', [
    'as'   => 'posts.edit',
    'uses' => 'PostsController@edit'
]);

Route::get('posts/{post}', [
    'as'   => 'posts.show',
    'uses' => 'PostsController@show'
]);



Route::apiResource('posts', 'PostsController');
