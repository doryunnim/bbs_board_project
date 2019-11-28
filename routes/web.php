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
Route::resource('introduces', 'NabeIntroduceController');

<<<<<<< HEAD
=======
Route::resource('introduce', 'NabeIntroduceController');

>>>>>>> d615f5891abcbfd3ac6f4ab932dc671bce64c8ae
DB::listen(function ($query){
});

