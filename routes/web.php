<?php

# 127.0.0.1:8000 들어가면 나오는 메인페이지
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('introduce','NabeIntroduceController');
