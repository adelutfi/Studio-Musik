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
    return view('home.studio.beranda');
});

Route::get('/admin', function () {
    return view('home.admin.beranda');
});

Route::get('/detail-studio', function () {
    return view('detail-studio');
});

Route::get('/semua-studio', function () {
    return view('studio');
});



Route::get('/login', function(){
	return view('auth.login');
})->name('login');
Route::get('/register', function(){
	return view('auth.register');
})->name('register');
