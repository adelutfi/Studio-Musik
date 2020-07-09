<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SewaAlat;
use App\SewaTempat;
use App\Studio;
use Auth;

class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:pemilik');
  }

  public function beranda(){
    $sewaAlat = SewaAlat::with('studio')->whereHas('studio', function($query){
      $query->where('id_pemilik', Auth::user()->id);
    })->get();

    $sewaTempat = SewaTempat::with('studio')->whereHas('studio', function($query){
      $query->where('id_pemilik', Auth::user()->id);
    })->get();

    return view('home.pemilik.beranda', compact('sewaAlat','sewaTempat'));
  }
}
