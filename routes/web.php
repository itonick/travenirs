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

Route::get('/', 'TravenirsController@index');
Route::resource('travenirs', 'TravenirsController');

Route::get('users.index', 'UsersController@index');
Route::resource('users', 'UsersController');
Route::get('users/show/{id}', 'UsersController@show')->name('users.show');

Route::get('users/{id}/edit', 'UsersController@edit')->name('users.edit');
Route::put('users/{id}', 'UsersController@update')->name('users.update');

Route::get('posts.index', 'PostsController@index');
Route::get('posts/search', 'PostsController@search')->name('posts.search');

Route::get('posts/{id}/edit', 'PostsController@edit')->name('posts.edit');
Route::put('posts/{id}', 'PostsController@update')->name('posts.update');

Route::get('questions.index', 'QuestionsController@index');
Route::get('show', 'QuestionsController@show')->name('questions.show');
Route::get('questions/search', 'QuestionsController@search')->name('questions.search');

Route::post('confirm', "AnswersController@confirm")->name("answers.confirm");
Route::post('complete', "AnswersController@complete")->name("answers.complete");

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
        Route::get('posts', 'UsersController@posts')->name('users.posts');
        Route::get('questions', 'UsersController@questions')->name('users.questions');
    });
    Route::resource('users', 'UsersController');
    
    Route::group(['prefix' => 'posts/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });
    
    Route::resource('posts', 'PostsController');
    Route::resource('questions', 'QuestionsController');
    Route::resource('answers', 'AnswersController', ['only' => ['index', 'show', 'create', 'store']]);
});