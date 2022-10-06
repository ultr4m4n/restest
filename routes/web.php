<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/users', 'UserController@index')->name('userList'); // list users
Route::get('/user/{id}', 'UserController@show')->name('userDetail'); // display user details route
Route::get('/user-create-page', 'UserController@createPage')->name('userCreatePage'); // create user page route
Route::get('/user-create', 'UserController@create')->name('userCreate'); // create user route
Route::post('/user-update/{id}', 'UserController@update')->name('userUpdate'); // update user route
Route::post('/user-delete/{id}', 'UserController@delete')->name('userDelete'); // delete user route

Route::get('/posts', 'PostController@index')->name('postList'); // list posts
Route::get('/post/{id}', 'PostController@show')->name('postDetail'); // display post comments routes
Route::get('/post-create-page', 'PostController@createPage')->name('postCreatePage'); // create post page route
Route::post('/post-create', 'PostController@create')->name('postCreate'); // create post route

Route::get('/todos', 'TodoController@index')->name('todoList'); // lost todos
Route::get('/todos-create-page', 'TodoController@createPage')->name('todoCreatePage'); // create todos page route
Route::post('/todos-create', 'TodoController@create')->name('todosCreate'); // create todos route
