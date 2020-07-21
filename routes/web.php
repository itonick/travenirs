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

Route::get('posts.index', 'PostsController@index');
Route::resource('posts', 'PostsController');

Route::get('questions.index', 'QuestionsController@index');
Route::resource('questions', 'QuestionsController');

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
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'create', 'edit', 'update']]);
    
    Route::group(['prefix' => 'posts/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });
    
    Route::resource('posts', 'PostsController', ['only' => ['store', 'destroy', 'edit', 'update', 'show', 'index', 'create']]);
    Route::resource('questions', 'QuestionsController', ['only' => ['store', 'destroy', 'edit', 'update', 'show', 'index', 'create']]);
});