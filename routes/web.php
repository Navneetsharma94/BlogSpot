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

Route::get('/blogspot', function () {
    return view('welcome');
});

Auth::routes();
//middleware group for admin

Route::group(['middleware' => ['auth', 'admin']], function() {

    Route::resource('dashboard', 'DashboardController')->name('*' ,'dashboard');
});
//home page
Route::get('/home', 'HomeController@index')->name('home');

//takes you to index page of user (part of  crud)
Route::get('/wallPost', 'PostController@index')->name('WallPost');

// CRUD for posts
Route::resource('posts', 'PostController');

// Route::get('/test', 'DisplayWallController@index');

Route::get('/index', 'IndexController@index')->name('index'); 
