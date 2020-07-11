<?php

namespace App\Http\Controllers\Penyewa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penyewa;
use Auth;

class AuthPenyewaController extends Controller
{
  public function __construct(){
    $this->middleware('guest:penyewa')->except(['logout']);
  }

  public function showRegister(){
    return view('auth.register');
  }

  public function showLogin(){
    return view('auth.login');
  }

  public function register(Request $request){
    $rule = [
      'nama' => 'required|regex:/^[\pL\s\-]+$/u',
      'email' => 'required|email|unique:penyewa',
      'password' => 'required|min:6|confirmed'
    ];
    $message = [
      'required' => 'tidak boleh kosong.',
      'email' => 'Masukan email dengan benar.',
      'min' => ':attributes minimal 6.',
      'confirmed' => 'Password tidak sama.',
      'nama.regex' => 'Masukan nama dengan benar',
      'unique' => 'Email sudah terdaftar'
    ];

    $this->validate($request, $rule, $message);

    Penyewa::create([
      'nama' => $request->nama,
      'email' => $request->email,
      'password' => bcrypt($request->password)
    ]);

    return redirect()->route('login')->with('success','register berhasil!');
    }

    public function login(Request $request){
      $credentials = [
        'email' => $request->email,
        'password' => $request->password
      ];

      if(Auth::guard('penyewa')->attempt($credentials)){
        return redirect('/');
      }else {
        return redirect()->back()->with('failed','')->withInput($request->input());
      }
    }

    public function logout(){
      Auth::guard('penyewa')->logout();
      return redirect()->route('login');
    }
}
