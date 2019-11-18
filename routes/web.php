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

<<<<<<< HEAD
=======
Route::get('gitPullTest', function(){
  return view('gitPullTest');
});

Route::get('auth/login', function(){
  return view('auth/login');
});

>>>>>>> 925c38927da3e006ff45d0556589de549cb5c917
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
