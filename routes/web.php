<?php

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
    return view('welcome');
});

<<<<<<< HEAD

Route::get('/resources/views/join.blade.php', function(){
    return view('join');
});

Route::get('auth/login', function(){
    $credentials = [
        'email' => 'john@example.com',
        'password' => 'password'
    ];
    
    if(!auth()->attempt($credentials)){
        return '로그인 정보가 정확하지 않습니다.';
    }

    return '로그인 되었습니다.';
});

Route::get('protected', function(){
    dump(session()->all());

    if(! auth()->check()){
        return '누구세요?';
    }

    return '어서 오세요' . auth()->user()->name;
});

Route::get('auth/logout', function(){
    auth()->logout();

    return '또 봐요~!';
});

=======
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> 0f7b57a4981f59b7a788c5d986e2a12f3508d02c
