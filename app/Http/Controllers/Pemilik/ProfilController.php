<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\Pemilik;
use Auth;
use Hash;

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
        'nama' => 'required|min:3|regex:/^[\pL\s\-]+$/u',
        'email' => 'required|email|unique:pemilik,email,'.$pemilik->id,
        'foto' => 'image|max:1024|mimes:jpg,png,jpeg',
        'alamat' => 'required|min:3'
      ];

      $message = [
        'required' => ':attribute tidak boleh kosong.',
        'nama.regex' => 'Masukan nama dengan benar',
        'nama.min' => 'Nama terlaku pendek',
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
        'no_telp' => 'required|numeric|unique:pemilik,no_telp,'.$pemilik->id,
        'no_rek' => 'required|numeric|unique:pemilik,no_rek,'.$pemilik->id,
      ];

      $message = [
        'required' => ':attribute tidak boleh kosong.',
        'no_telp.unique' => 'No Telepon sudah terdaftar',
        'no_telp.numeric' => 'No Telepon tidak benar',
        'no_rek.unique' => 'No Rekening sudah terdaftar',
        'no_rek.numeric' => 'No Rekening tidak benar',
      ];

    $this->validate($request, $rule, $message);

    $pemilik->update([
      'no_telp' => $request->no_telp,
      'no_rek' => $request->no_rek
    ]);

    return redirect()->back()->with('pribadi','Data Pribadi berhasil diubah');
  }

  public function updatePassword(Request $request){
    // dd($request->all());
    $pemilik = Auth::user();
    $rule = [
      'old_password' => 'required',
      'password' => 'required|min:6|confirmed'
    ];

    $message = [
      'password.min' => 'Password minimal 6 karakter',
      'password.confirmed' => 'Password tidak sama'
    ];

    $this->validate($request, $rule, $message);

    if(Hash::check($request->old_password, $pemilik->password)){
       $pemilik->update(['password' => bcrypt($request->password)]);
       return back()->with('successPassword','Password berhasil diubah');
    }else{
        return back()->with('failedPassword','Password lama tidak cocok');
    }
  }
}
