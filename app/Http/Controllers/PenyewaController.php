<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Penyewa;
use App\PemesananAlat;
use Storage;

class PenyewaController extends Controller
{
       public function __construct()
  {
    $this->middleware('auth:penyewa');
  }

  public function index(){
  	return view('profil');
  }

  public function update(Request $request){
    // dd($request->all());
  	$penyewa = Auth::user();
  	$rule = [
        'nama' => 'required|regex:/^[\pL\s\-]+$/u',
        'email' => 'required|email|unique:penyewa,email,'.$penyewa->id,
        'no_telp' => 'required|unique:penyewa,no_telp,'.$penyewa->id,
        'foto' => 'image|max:1024|mimes:jpg,png,jpeg',
        'ktp' => 'image|max:1024|mimes:jpg,png,jpeg',
        'alamat' => 'required|min:10'
      ];

      $message = [
        'required' => ':attribute tidak boleh kosong.',
        'nama.regex' => 'Masukan nama dengan benar',
        'foto.max' => 'Foto Terlalu Besar maks 2MB',
        'ktp.max' => 'Ktp Terlalu Besar maks 2MB',
        'email.unique' => 'Email sudah terdaftar di akun lain',
        'email.no_telp' => 'No Telepon sudah terdaftar di akun lain',
        'alamat.min' => 'Alamat terlalu pendek',
        'email.email' => 'Masukan email dengan benar',
      ];

      $this->validate($request, $rule, $message);

  		$foto = $penyewa->foto;
  		$ktp = $penyewa->ktp;

      if($request->foto){
        if($foto != 'gambar/foto.png'){
          if (Storage::exists($foto)) {
             Storage::delete($foto);
         }
        }
        $foto = $request->file('foto')->store('gambar');
      }

      if($request->ktp){
        $ktp = $request->file('ktp')->store('gambar/ktp');
      }

      $penyewa->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'foto' => $foto,
        'ktp' => $ktp,
        'alamat' => trim($request->alamat),
        'no_telp' => $request->no_telp
      ]);

  	  return redirect()->back()->with('success', 'Profil berhasil diubah');
  }

  public function reminder(){
    $pemesanan = PemesananAlat::where('id_penyewa', Auth::user()->id)->where('status', 0)->paginate(6);
    return view('reminder', compact('pemesanan'));
  }
}
