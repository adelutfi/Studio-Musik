<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:pemilik');
  }

  public function beranda(){
    return view('home.pemilik.beranda');
  }
}
