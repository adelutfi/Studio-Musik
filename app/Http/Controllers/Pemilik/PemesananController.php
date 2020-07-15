<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PemesananTempat;
use App\pemesananAlat;
use Auth;

class PemesananController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:pemilik');
  }

  public function pemesananTempat(){
    $pemesanan = PemesananTempat::with('studio')->whereHas('studio', function($query){
      $query->where('id_pemilik', Auth::user()->id);
    })->orderBy('id', 'DESC')->get();

    return view('home.pemilik.pemesanan.pemesanan-tempat', compact('pemesanan'));
  }
}
