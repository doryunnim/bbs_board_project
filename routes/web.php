<?php

# 127.0.0.1:8000 들어가면 나오는 메인페이지
Route::get('/', function () {
    return view('main');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::resource('articles','NabeJapanController');

Route::resource('qnaArticles','QnaArticlesController');

Route::resource('qnaComments', 'QnaCommentsController', ['only' => ['update', 'destroy']]);
Route::resource('qnaArticles.qnaComments', 'QnaCommentsController', ['only' => 'store']);

Route::resource('introduce', 'NabeIntroduceController');

DB::listen(function ($query){
});
