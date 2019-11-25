<?php
Auth::routes();

# 127.0.0.1:8000 들어가면 로그인 창
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index');

Route::resource('introduce','NabeIntroduceController');
