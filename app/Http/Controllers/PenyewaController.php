<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Penyewa;

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
  	$penyewa = Auth::user();
  	// $rule = [
   //      'nama' => 'required|min:3',
   //      'email' => 'required|email|unique:penyewa,email,'.$penyewa->id,
   //      'no_telp' => 'required|unique:penyewa,no_telp,'.$penyewa->id,
   //      'foto' => 'image|max:1024|mimes:jpg,png,jpeg',
   //      'alamat' => 'required|min:3'
   //    ];

   //    $message = [
   //      'required' => ':attribute tidak boleh kosong.',
   //      'min' => 'terlaku pendek',
   //      'max' => 'dengan benar',
   //      'email.unique' => 'Email sudah terdaftar di akun lain',
   //      'email.no_telp' => 'No Telepon sudah terdaftar di akun lain', 
   //    ];

   //    $this->validate($request, $rule, $message);
  		 // dd($request->all());

  		$foto = $penyewa->foto;

       if($request->foto){
        if($foto != 'gambar/foto.png'){
          if (Storage::exists($foto)) {
             Storage::delete($foto);
         }
        }
        $foto = $request->file('foto')->store('gambar');
      }

      // dd($request->all());

      $penyewa->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'foto' => $foto,
        'alamat' => trim($request->alamat),
        'no_telp' => $request->no_telp
      ]);

  	  return redirect()->back()->with('message', 'Profil berhasil diubah');
  }
}
