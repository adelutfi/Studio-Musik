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

Route::post('admin/login','Admin\AuthAdminController@login')->name('admin.login');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/studio', function () {
    return view('home.studio.beranda');
});

Route::get('/admin', function () {
    return view('home.admin.beranda');
});

Route::get('/admin/login', function () {
    return view('auth.admin-login');
});

Route::get('/detail-studio', function () {
    return view('detail-studio');
});

Route::get('/semua-studio', function () {
    return view('studio');
});

Route::get('/pemesanan/{keterangan}', function () {
    return view('pemesanan');
});

Route::get('/penyewaan', function () {
    return view('penyewaan');
});



Route::get('/login', function(){
	return view('auth.login');
})->name('login');
Route::get('/register', function(){
	return view('auth.register');
})->name('register');
