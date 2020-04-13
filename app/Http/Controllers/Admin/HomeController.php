<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
  	{
      $this->middleware('auth:admin');
  	}

  	public function beranda(){
  		return view('home.admin.beranda');
  	}

}
