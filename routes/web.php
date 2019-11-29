<?php
Auth::routes();

# 127.0.0.1:8000 들어가면 로그인 창
Route::get('/', function () {
    return view('main');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('japan','NabeJapanController');
<<<<<<< HEAD

=======
>>>>>>> 129dfba387701ba2b082403cc0cb0b12c2f78878
Route::resource('qnaArticles','QnaArticlesController');
Route::resource('introduces', 'NabeIntroduceController');
Route::resource('articles','NabeJapanController');

Route::resource('qnaComments', 'QnaCommentsController', ['only' => ['update', 'destroy']]);
Route::resource('qnaArticles.qnaComments', 'QnaCommentsController', ['only' => 'store']);

DB::listen(function ($query){
});
