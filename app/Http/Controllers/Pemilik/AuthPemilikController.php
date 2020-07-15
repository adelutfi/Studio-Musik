<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemilik;
use App\Penyewa;
use Auth;
use App\Mail\NewUserNotification;
use Mail;
use Crypt;

class AuthPemilikController extends Controller
{
    public function __construct(){
      $this->middleware('guest:pemilik')->except(['logout','confirmEmail']);
    }

    public function showLogin(){
      return view('auth.pemilik-login');
    }

    public function showRegister(){
      return view('auth.pemilik-register');
    }

    public function register(Request $request){
      $rule = [
        'nama' => 'required|regex:/^[\pL\s\-]+$/u',
        'email' => 'required|email|unique:pemilik',
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

      $pemilik = Pemilik::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => bcrypt($request->password)
      ]);
      $token = Crypt::encrypt($pemilik->email);
      $nama = $pemilik->nama;
      $guard = 'pemilik';

      Mail::to($pemilik->email)->send(new NewUserNotification($nama,$token, $guard));

      return redirect()->route('pemilik.show.login')->with('success','register berhasil!');
    }

    public function login(Request $request){
      $credentials = [
        'email' => $request->email,
        'password' => $request->password
      ];

      if(Auth::guard('pemilik')->attempt($credentials)){
        return redirect()->route('pemilik.beranda');
      }else {
        return redirect()->back()->with('failed','')->withInput($request->input());
      }
    }

    public function logout(){
      Auth::guard('pemilik')->logout();
      return redirect()->route('pemilik.show.login');
    }

    public function confirmEmail($token){
      try {
        $email = Crypt::decrypt($token);
        $pemilik = Pemilik::where('email', $email)->where('verifikasi_email', null)->first();
        if($pemilik){
          $pemilik->update(['verifikasi_email' => now()]);
          return redirect('/pemilik/login')->with('emailSuccess', '');
        }else {
          return redirect('/pemilik/login')->with('emailFailed', '');
        }
      } catch (\Exception $e) {
        return redirect('/pemilik/login');
      }
    }

}
