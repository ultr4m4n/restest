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

Route::get('/users', 'UserController@index')->name('userList');
Route::get('/user/{id}', 'UserController@show')->name('userDetail');

Route::get('/posts', 'PostController@index')->name('postList');
Route::get('/post/{id}', 'PostController@show')->name('postDetail');
Route::get('/post-create-page', 'PostController@createPage')->name('postCreatePage');
Route::post('/post-create', 'PostController@create')->name('postCreate');

Route::get('/todos', 'TodoController@index')->name('todoList');
