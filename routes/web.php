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
})->middleware('auth:pemilik');


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


// Routing lingkup Admin
Route::group(['prefix' => 'admin'], function(){
    Route::get('/login','Admin\AuthAdminController@showLogin')->name('admin.login');
    Route::post('login','Admin\AuthAdminController@login')->name('admin.to.login');
    Route::get('/beranda','Admin\HomeController@beranda')->name('admin.beranda');
    Route::get('/pemilik','Admin\HomeController@pemilik')->name('admin.pemilik');
    Route::post('logout','Admin\AuthAdminController@logout')->name('admin.logout');
});

// Routing lingkup sebelum login
Route::group(['prefix' => '/'], function(){
  Route::get('register','Auth\AuthUserController@showRegister')->name('register');
  Route::get('login','Auth\AuthUserController@showLogin')->name('login');
  Route::post('register','Auth\AuthUserController@register')->name('user.register');

});
