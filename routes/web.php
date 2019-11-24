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
    return view('main_content', compact('japans'));
});

// Route::get('/join', function () {
//     return view('join');
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('japan','NabeJapanController'); #현지학기제 컨트롤러

Route::resource('introduce','NabeIntroduceController'); #조원소개 컨트롤러