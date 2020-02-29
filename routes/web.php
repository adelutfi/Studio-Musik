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

Route::get('/studio', function () {
    return view('templates.studio.default');
});

Route::get('/detail-studio', function () {
    return view('detail-studio');
});



Route::get('/login', function(){
	return view('auth.login');
})->name('login');
Route::get('/register', function(){
	return view('auth.register');
})->name('register');
