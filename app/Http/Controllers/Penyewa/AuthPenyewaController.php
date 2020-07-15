<?php

namespace App\Http\Controllers\Penyewa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penyewa;
use Auth;
use App\Mail\NewUserNotification;
use Mail;
use Crypt;

class AuthPenyewaController extends Controller
{
  public function __construct(){
    $this->middleware('guest:penyewa')->except(['logout','confirmEmail']);
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

    $penyewa = Penyewa::create([
      'nama' => $request->nama,
      'email' => $request->email,
      'password' => bcrypt($request->password)
    ]);

    $token = Crypt::encrypt($penyewa->email);
    $nama = $penyewa->nama;
    $guard = 'penyewa';

    Mail::to($penyewa->email)->send(new NewUserNotification($nama,$token, $guard));

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

    public function confirmEmail($token){
      try {
        $email = Crypt::decrypt($token);
        $penyewa = Penyewa::where('email', $email)->where('verifikasi_email', null)->first();
        if($penyewa){
          $penyewa->update(['verifikasi_email' => now()]);
          return redirect('/')->with('emailSuccess', '');
        }else {
          return redirect('/')->with('emailFailed', '');
        }
      } catch (\Exception $e) {
        return redirect('/');
      }
    }
}
