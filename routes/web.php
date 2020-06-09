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

Route::group(['prefix' => '/'], function(){
Route::get('/','DataStudioController@index')->name('welcome');
Route::get('detail/{studio}','DataStudioController@show')->name('detail.studio');
Route::get('semua-studio','DataStudioController@semuaStudio')->name('semua.studio');
Route::get('s={studio}/ket={keterangan}/pemesanan','PemesananController@index')->name('pemesanan');
Route::get('profil','PenyewaController@index')->name('profil');
Route::patch('profil','PenyewaController@update')->name('profil.update');

});

// Routing lingkup Admin
Route::group(['prefix' => 'admin'], function(){
    Route::get('/login','Admin\AuthAdminController@showLogin')->name('admin.login');
    Route::post('login','Admin\AuthAdminController@login')->name('admin.to.login');
    Route::get('/beranda','Admin\HomeController@beranda')->name('admin.beranda');
    Route::get('/pemilik','Admin\HomeController@pemilik')->name('admin.pemilik');
    Route::get('/studio','Admin\HomeController@studio')->name('admin.studio');
    Route::patch('/studio/{studio}','Admin\HomeController@terimaStudio')->name('admin.studio.terima');
    Route::post('logout','Admin\AuthAdminController@logout')->name('admin.logout');
});

// Routing lingkup sebelum login
Route::group(['prefix' => '/'], function(){
  Route::get('register','Auth\AuthUserController@showRegister')->name('register');
  Route::get('login','Auth\AuthUserController@showLogin')->name('login');
  Route::post('register','Auth\AuthUserController@register')->name('user.register');
  Route::post('login','Auth\AuthUserController@login')->name('user.login');
  Route::post('logout','Auth\AuthUserController@logoutPenyewa')->name('penyewa.logout');
});

// Routing lingkup pemilik
Route::group(['prefix' => 'pemilik'], function(){
  Route::get('beranda','Pemilik\HomeController@beranda')->name('pemilik.beranda');
  Route::get('studio','Pemilik\StudioController@index')->name('pemilik.studio');
  Route::get('studio/tambah-studio','Pemilik\StudioController@create')->name('pemilik.tambah.studio');
  Route::post('studio/tambah-studio','Pemilik\StudioController@store')->name('pemilik.simpan.studio');
  Route::get('studio/edit/{studio}', 'Pemilik\StudioController@edit')->name('pemilik.edit.studio');
  Route::patch('studio/edit/{studio}','Pemilik\StudioController@update')->name('pemilik.update.studio');

  Route::get('penyewaan/sewa-tempat','Pemilik\SewaTempatController@index')->name('pemilik.sewa-tempat');
  Route::get('penyewaan/sewa-tempat/tambah','Pemilik\SewaTempatController@create')->name('pemilik.tambah.sewa-tempat');
  Route::post('penyewaan/sewa-tempat/tambah','Pemilik\SewaTempatController@store')->name('pemilik.simpan.sewa-tempat');

  Route::get('penyewaan/sewa-alat','Pemilik\SewaAlatController@index')->name('pemilik.sewa-alat');
  Route::get('penyewaan/sewa-alat/tambah','Pemilik\SewaAlatController@create')->name('pemilik.tambah.sewa-alat');
  Route::post('penyewaan/sewa-alat/tambah','Pemilik\SewaAlatController@store')->name('pemilik.simpan.sewa-alat');

  Route::post('logout','Auth\AuthUserController@logoutPemilik')->name('pemilik.logout');
  Route::get('profil','Pemilik\ProfilController@index')->name('pemilik.profil');
  Route::patch('profil/umum','Pemilik\ProfilController@updateProfil')->name('pemilik.update.profil');
  Route::patch('profil/pribadi','Pemilik\ProfilController@updatePersonal')->name('pemilik.update.personal');
});
