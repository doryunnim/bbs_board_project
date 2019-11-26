<?php
Auth::routes();

# 127.0.0.1:8000 들어가면 로그인 창
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('articles','NabeJapanController');
Route::resource('qnaArticles','QnaArticlesController');
Route::resource('introduce', 'NabeIntroduceController');

DB::listen(function ($query){
});

