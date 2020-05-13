<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemilik;
use App\Penyewa;
use Auth;

class AuthUserController extends Controller
{
   public function __construct()
    {
      $this->middleware(['guest:pemilik','guest:penyewa'])->except(['logoutPemilik', 'logoutPenyewa']);
    }


    public function showRegister(){
      return view('auth.register');
    }

    public function register(Request $request){
      $rule = [
        'nama' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed'
      ];
      $message = [
        'required' => 'tidak boleh kosong.',
        'email' => 'Masukan email dengan benar.',
        'min' => ':attributes minimal 6.',
        'confirmed' => 'Password tidak sama.'
      ];

      $this->validate($request, $rule, $message);

    if($request->keterangan == 'pemilik'){
        $emailPemilik = Pemilik::where('email', $request->email)->first();
        if($emailPemilik){
          return redirect()->back()
          ->withInput($request->input())
          ->with('message','Email pemilik sudah terdaftar!')
          ->with('email','Email sudah terdaftar!');
        }else {
          Pemilik::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password)
          ]);

          return redirect()->route('login')->with('success','register berhasil!');
        }
      }else {
         $emailPenyewa = Penyewa::where('email', $request->email)->first();
        if($emailPenyewa){
          return redirect()->back()
          ->withInput($request->input())
          ->with('message','Email penyewa sudah terdaftar!')
          ->with('email','Email sudah terdaftar!');
        }else {
          Penyewa::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password)
          ]);

          return redirect()->route('login')->with('success','register berhasil!');
        }
      }

    }

    public function showLogin(){
      return view('auth.login');
    }

    public function login(Request $request){
      $credentials = [
        'email' => $request->email,
        'password' => $request->password
      ];

      if($request->keterangan == 'pemilik'){
        if(Auth::guard('pemilik')->attempt($credentials)){
          return redirect()->route('pemilik.beranda');
        }else {
          return redirect()->back()->with('message','Gagal Login')->withInput($request->input());
        }
      }else{
         if(Auth::guard('penyewa')->attempt($credentials)){
          return redirect('/');
        }else {
          return redirect()->back()->with('message','Gagal Login')->withInput($request->input());
        }
      }
    }

    public function logoutPemilik(){
      Auth::guard('pemilik')->logout();
      return redirect()->route('login');
    }

     public function logoutPenyewa(){
      Auth::guard('penyewa')->logout();
      return redirect()->route('login');
    }



}
