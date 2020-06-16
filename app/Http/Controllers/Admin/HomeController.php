<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemilik;
use App\Studio;
use App\Penyewa;
use App\Rating;

class HomeController extends Controller
{
    public function __construct()
  	{
      $this->middleware('auth:admin');
  	}

  	public function beranda(){
      $penyewa = count(Penyewa::all());
      $pemilik = count(Pemilik::all());
      $studio = count(Studio::all());

  		return view('home.admin.beranda', compact('penyewa','pemilik','studio'));
  	}

  	public function pemilik(){
      $pemilik = Pemilik::orderBy('id', 'DESC')->get();
  		return view('home.admin.data-pemilik', compact('pemilik'));
  	}

    public function penyewa(){
      $penyewa = Penyewa::orderBy('id', 'DESC')->get();
      return view('home.admin.data-penyewa', compact('penyewa'));
    }

  	public function studio(){
      $studio = Studio::orderBy('id', 'DESC')->get();
  		return view('home.admin.data-studio', compact('studio'));
  	}

    public function terimaStudio(Request $request, Studio $studio){
      $studio->update([ 'status' => 1 ]);
      Rating::create([
        'id_studio' => $studio->id,
        'nilai' => $request->rating
      ]);

      return redirect()->back()->with('message','Berhasil');
    }

}
