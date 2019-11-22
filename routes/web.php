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

# resource Posts
Route::apiResource('posts', 'PostsController');


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


# model states
Route::get("model-states-reset", function(){

    $post = \App\Post::first();

    \Log::info(["Model State: dirty?", $post->isDirty()]);
    \Log::info(["Model State: clean?", $post->isClean()]);
    \Log::info(["Model State: Was Changed?", $post->wasChanged()]);
    //\Log::info(["Model State: Has Changes?", $post->hasChanges(["title"=>'hello'])]);
    \Log::info(["Model State: Get Dirty", $post->getDirty()]);
    \Log::info(["Model State: Get Changes", $post->getChanges()]);

    $post->title = "hello world!";
    
    \Log::info("--------------Set title ---------------------------");

    \Log::info(["Model State: dirty?", $post->isDirty()]);
    \Log::info(["Model State: clean?", $post->isClean()]);
    \Log::info(["Model State: Get Dirty", $post->getDirty()]);

    $freshPost = $post->fresh();
    \Log::info(["Post", $post->title]);
    \Log::info(["Fresh Post", $freshPost->title]);

    \Log::info("--------------Refresh Post ---------------------------");
    $post->refresh();
    \Log::info(["Post", $post->title]);
    \Log::info(["Model State: dirty?", $post->isDirty()]);
    \Log::info(["Model State: clean?", $post->isClean()]);
    \Log::info(["Model State: Get Dirty", $post->getDirty()]);


    $post->title = "hello world1";
    $post->save();
    \Log::info("--------------Updated title ---------------------------");


    
    \Log::info(["Model State: Was Changed?", $post->wasChanged()]);
    //\Log::info(["Model State: Has Changes?", $post->hasChanges(["title"=>'hello'])]);
    \Log::info(["Model State: Get Changes", $post->getChanges()]);
    
    return $post;
});

# Automatic Model Validation.

Route::get('auto-model-validation', function(){
    $user = new \App\User();

    dd($user->save());
});


