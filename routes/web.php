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


# model states
Route::get("model-states", function(){

    $post = \App\Post::first();

    \Log::info(["Model State: dirty?", $post->isDirty()]);
    \Log::info(["Model State: clean?", $post->isClean()]);
    \Log::info(["Model State: Was Changed?", $post->wasChanged()]);
    //\Log::info(["Model State: Has Changes?", $post->hasChanges(["title"=>'hello'])]);

    \Log::info(["Model State: Get Dirty", $post->getDirty()]);
    \Log::info(["Model State: Get Changes", $post->getChanges()]);

    $post->title = "hello world!";
    
    \Log::info("--------------Updated title ---------------------------");

    \Log::info(["Model State: dirty?", $post->isDirty()]);
    \Log::info(["Model State: clean?", $post->isClean()]);
    \Log::info(["Model State: Get Dirty", $post->getDirty()]);

    $post->save();

    \Log::info(["Model State: Was Changed?", $post->wasChanged()]);
    //\Log::info(["Model State: Has Changes?", $post->hasChanges(["title"=>'hello'])]);

    
    \Log::info(["Model State: Get Changes", $post->getChanges()]);
    
    return $post;
});



Route::apiResource('posts', 'PostsController');
