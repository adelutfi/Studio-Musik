<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemilik;
use Auth;

class AuthUserController extends Controller
{
  public function __construct()
    {
      $this->middleware('guest:pemilik')->except(['logoutPemilik']);
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
          return redirect()->back()->with('message','Email sudah ada.');
        }else {
          Pemilik::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password)
          ]);

          return redirect()->route('login');
        }
      }else {

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
          return redirect()->back()->with('message','Gagal Login');
        }
      }
    }

    public function logoutPemilik(){
      Auth::guard('pemilik')->logout();
      return redirect()->route('login');
    }



}