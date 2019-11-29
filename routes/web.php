<?php
Auth::routes();

# 127.0.0.1:8000 들어가면 로그인 창
Route::get('/', function () {
    return view('main');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::resource('articles','NabeJapanController');
Route::resource('qnaArticles','QnaArticlesController');
<<<<<<< HEAD

Route::resource('qnaComments', 'QnaCommentsController', ['only' => ['update', 'destroy']]);
Route::resource('qnaArticles.qnaComments', 'QnaCommentsController', ['only' => 'store']);

Route::resource('introduce', 'NabeIntroduceController');
=======
Route::resource('introduces', 'NabeIntroduceController');
>>>>>>> 2354ea1a01a2e7fe3e99ae76da10876bd6f61564

DB::listen(function ($query){
});

