<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\Pemilik;
use Auth;

class ProfilController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:pemilik');
    }

    public function index(){
      return view('home.pemilik.profil');
    }

    public function updateProfil(Request $request){
      $pemilik = Auth::user();
      $rule = [
        'nama' => 'required|min:3',
        'email' => 'required|email|unique:pemilik,email,'.$pemilik->id,
        'foto' => 'image|max:1024|mimes:jpg,png,jpeg',
        'alamat' => 'required|min:3'
      ];

      $message = [
        'required' => ':attribute tidak boleh kosong.',
        'min' => 'terlaku pendek',
        'max' => 'dengan benar'
      ];

      $this->validate($request, $rule, $message);

      $foto = $pemilik->foto;

      if($request->foto){
        if($foto != 'gambar/foto.png'){
          if (Storage::exists($foto)) {
             Storage::delete($foto);
         }
        }
        $foto = $request->file('foto')->store('gambar');
      }

      $pemilik->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'foto' => $foto,
        'alamat' => $request->alamat
      ]);

      return redirect()->back()->with('message','Profil berhasil dirubah');
    }

    public function updatePersonal(Request $request){
      $pemilik = Auth::user();
      $rule = [
        'no_telp' => 'required|min:11|max:13|unique:pemilik,no_telp,'.$pemilik->id,
        'no_rek' => 'required|min:16|max:16|unique:pemilik,no_rek,'.$pemilik->id,
      ];

      $message = [
        'required' => ':attribute tidak boleh kosong.',
        'min' => 'terlaku pendek',
        'max' => 'dengan benar'
      ];

    $this->validate($request, $rule, $message);

    $pemilik->update([
      'no_telp' => $request->no_telp,
      'no_rek' => $request->no_rek
    ]);

    return redirect()->back()->with('pribadi','Data Pribadi berhasil diubah');
  }
}
