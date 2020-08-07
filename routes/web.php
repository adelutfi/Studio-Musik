  <?php

  //
  // Route::get('test', function () {
  //   event(new App\Events\PenyewaNotification('Someone',1));
  //   return "Event has been sent!";
  // });

// Route::get('/payment','PemesananController@testPayment');
// Route::get('konfirmasi/email/{token}','Pemilik\AuthPemilikController@confirmEmail');


Route::group(['prefix' => '/'], function(){
  Route::get('register','Penyewa\AuthPenyewaController@showRegister')->name('register');
  Route::post('register','Penyewa\AuthPenyewaController@register')->name('penyewa.register');
  Route::get('login','Penyewa\AuthPenyewaController@showLogin')->name('login');
  Route::post('login','Penyewa\AuthPenyewaController@login')->name('penyewa.login');
  Route::post('logout','Penyewa\AuthPenyewaController@logout')->name('penyewa.logout');
  Route::get('lupa-password','Penyewa\ForgotPasswordController@index')->name('penyewa.lupa-password');
  Route::get('penyewa/konfirmasi/email/{token}','Penyewa\AuthPenyewaController@confirmEmail');

  Route::get('/','DataStudioController@index')->name('welcome');
  Route::get('detail/{studio}','DataStudioController@show')->name('detail.studio');
  Route::get('semua-studio/cari','DataStudioController@search')->name('cari.studio');
  Route::get('semua-studio/filter','DataStudioController@filter')->name('filter.studio');
  // Route::get('semua-studio/filter/','DataStudioController@filter')->name('filter.studio');
  Route::get('semua-studio','DataStudioController@semuaStudio')->name('semua.studio');
  Route::get('pemesanan/payment-gateway','PemesananController@paymentGateway');
  Route::get('pemesanan/tempat','Penyewa\PemesananController@pemesananTempat')->name('pemesanan.tempat');
  Route::get('pemesanan/alat','Penyewa\PemesananController@PemesananAlat')->name('pemesanan.alat');
  Route::get('s={studio}/ket={keterangan}/pemesanan','PemesananController@index')->name('pemesanan');
  Route::get('profil','PenyewaController@index')->name('profil');
  Route::get('reminder','PenyewaController@reminder')->name('reminder');
  Route::patch('profil','PenyewaController@update')->name('profil.update');
  Route::get('kontak', function(){
    return view('kontak');
  })->name('kontak');

  Route::post('penyewa/pemesanan/{studio}','Penyewa\PemesananController@storePemesananTempat')->name('simpan.pemesanan.tempat');
  Route::post('penyewa/pemesanan/alat/{studio}','Penyewa\PemesananController@storePemesananAlat')->name('simpan.pemesanan.alat');
  Route::get('cek/pemesanan/tempat', 'PemesananController@pemesananTempat');
  Route::post('rating/alat/{id}', 'Penyewa\PemesananController@ratingAlat')->name('rating.alat');

});

// Routing lingkup Admin
Route::group(['prefix' => 'admin'], function(){
    Route::get('/login','Admin\AuthAdminController@showLogin')->name('admin.login');
    Route::post('login','Admin\AuthAdminController@login')->name('admin.to.login');
    Route::get('/beranda','Admin\HomeController@beranda')->name('admin.beranda');
    Route::get('/pemilik','Admin\HomeController@pemilik')->name('admin.pemilik');
    Route::get('/penyewa','Admin\HomeController@penyewa')->name('admin.penyewa');
    Route::get('/studio','Admin\HomeController@studio')->name('admin.studio');
    Route::get('/penyewaan','Admin\HomeController@penyewaan')->name('admin.penyewaan');
    Route::patch('/studio/{studio}','Admin\HomeController@terimaStudio')->name('admin.studio.terima');
    Route::post('logout','Admin\AuthAdminController@logout')->name('admin.logout');

    Route::patch('/penyewa/status/{penyewa}','Admin\PenyewaController@status')->name('admin.penyewa.status');
    Route::patch('/penyewa/ktp/{penyewa}','Admin\PenyewaController@ktp')->name('admin.penyewa.ktp');


});


// Routing lingkup pemilik
Route::group(['prefix' => 'pemilik'], function(){
  // authentication
  Route::get('register','Pemilik\AuthPemilikController@showRegister')->name('pemilik.show.register');
  Route::post('register','Pemilik\AuthPemilikController@register')->name('pemilik.register');
  Route::get('login','Pemilik\AuthPemilikController@showLogin')->name('pemilik.show.login');
  Route::post('login','Pemilik\AuthPemilikController@login')->name('pemilik.login');
  Route::post('logout','Pemilik\AuthPemilikController@logout')->name('pemilik.logout');
  Route::get('lupa-password','Pemilik\ForgotPasswordController@index')->name('pemilik.lupa-password');
  Route::get('/konfirmasi/email/{token}','Pemilik\AuthPemilikController@confirmEmail');

  // Home
  Route::get('beranda','Pemilik\HomeController@beranda')->name('pemilik.beranda');
  Route::get('studio','Pemilik\StudioController@index')->name('pemilik.studio');
  Route::get('studio/tambah-studio','Pemilik\StudioController@create')->name('pemilik.tambah.studio');
  Route::post('studio/tambah-studio','Pemilik\StudioController@store')->name('pemilik.simpan.studio');
  Route::get('studio/edit/{studio}', 'Pemilik\StudioController@edit')->name('pemilik.edit.studio');
  Route::patch('studio/edit/{studio}','Pemilik\StudioController@update')->name('pemilik.update.studio');
  Route::delete('studio/hapus/{studio}','Pemilik\StudioController@destroy')->name('pemilik.hapus.studio');

  Route::get('penyewaan/sewa-tempat','Pemilik\SewaTempatController@index')->name('pemilik.sewa-tempat');
  Route::get('penyewaan/sewa-tempat/tambah','Pemilik\SewaTempatController@create')->name('pemilik.tambah.sewa-tempat');
  Route::post('penyewaan/sewa-tempat/tambah','Pemilik\SewaTempatController@store')->name('pemilik.simpan.sewa-tempat');
  Route::get('penyewaan/sewa-tempat/edit/{sewaTempat}','Pemilik\SewaTempatController@edit')->name('pemilik.edit.sewa-tempat');
  Route::patch('penyewaan/sewa-tempat/edit/{sewaTempat}','Pemilik\SewaTempatController@update')->name('pemilik.update.sewa-tempat');
  Route::delete('penyewaan/sewa-tempat/hapus/{sewaTempat}','Pemilik\SewaTempatController@destroy')->name('pemilik.hapus.sewa-tempat');

  Route::get('penyewaan/sewa-alat','Pemilik\SewaAlatController@index')->name('pemilik.sewa-alat');
  Route::get('penyewaan/sewa-alat/tambah','Pemilik\SewaAlatController@create')->name('pemilik.tambah.sewa-alat');
  Route::post('penyewaan/sewa-alat/tambah','Pemilik\SewaAlatController@store')->name('pemilik.simpan.sewa-alat');
  Route::get('penyewaan/sewa-alat/edit/{sewaAlat}','Pemilik\SewaAlatController@edit')->name('pemilik.edit.sewa-alat');
  Route::patch('penyewaan/sewa-alat/edit/{sewaAlat}','Pemilik\SewaAlatController@update')->name('pemilik.update.sewa-alat');
  Route::delete('penyewaan/sewa-alat/hapus/{sewaAlat}','Pemilik\SewaAlatController@destroy')->name('pemilik.hapus.sewa-alat');

  Route::get('pemesanan/tempat','Pemilik\PemesananController@pemesananTempat')->name('pemilik.pemesanan.tempat');
  Route::get('pemesanan/alat','Pemilik\PemesananController@pemesananAlat')->name('pemilik.pemesanan.alat');

  Route::get('profil','Pemilik\ProfilController@index')->name('pemilik.profil');
  Route::patch('profil/umum','Pemilik\ProfilController@updateProfil')->name('pemilik.update.profil');
  Route::patch('profil/pribadi','Pemilik\ProfilController@updatePersonal')->name('pemilik.update.personal');

  Route::patch('kirim/alat/{pemesanan}','Pemilik\PemesananController@notifikasiPengiriman')->name('pemilik.kirim.alat');
  Route::put('kirim/alat/{pemesanan}','Pemilik\PemesananController@notifikasiSelesai')->name('pemilik.selesai.alat');

  Route::get('pemesanan/alat/pdf', 'Pemilik\PemesananController@pdfSewaAlat')->name('pdf.sewa-alat');


});
