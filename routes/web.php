<?php
use App\NabeJapan;

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
    $japans = \App\NabeJapan::get();
    return view('main', compact('japans'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('japan','NabeJapanController');

Route::get('/app',function(){
    return view('layouts/app');
});