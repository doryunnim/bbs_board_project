<?php

Route::get('/', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('home/show', 'HomeController@show');

Route::get('/introduce/create', 'NabeIntroduceController@create');

Route::post('/introduce/create', 'NabeIntroduceController@store');