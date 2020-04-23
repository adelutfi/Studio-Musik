<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class StudioController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:pemilik');
    }

    public function index(){
      return view('home.pemilik.studio.index');
    }

    public function tambah(){
      $user = Auth::user();
      if($user->verifikasi_email && $user->no_rek){
        return view('home.pemilik.studio.tambah-studio');
      }

      return redirect()->back()->with('message','Verikasi Email & Lengkapi Profil anda.');
    }
}
