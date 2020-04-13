<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemilik;

class HomeController extends Controller
{
    public function __construct()
  	{
      $this->middleware('auth:admin');
  	}

  	public function beranda(){
  		return view('home.admin.beranda');
  	}

  	public function pemilik(){
      $pemilik = Pemilik::orderBy('id', 'DESC')->get();
  		return view('home.admin.data-pemilik', compact('pemilik'));
  	}

}
