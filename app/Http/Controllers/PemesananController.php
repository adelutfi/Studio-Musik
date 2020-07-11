<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;
use Auth;

class PemesananController extends Controller
{
     public function __construct()
  {
    $this->middleware('auth:penyewa');
  }

  public function index(Request $request, Studio $studio){
  	if($request->keterangan == 'sewa-alat'){
  		if(Auth::user()->konfirmasi_ktp){
  			return view('pemesanan', compact('studio'));
  		}else{
  		return redirect()->back()->with('message','Sepertinya Ktp anda belum di konfirmasi oleh admin');
  		}
  	}
  	// dd($request->keterangan);
  	// if(!$studio->sewaTempat || !$studio->sewaAlat){
  	// 	return redirect()->back();
  	// }
  	return view('pemesanan', compact('studio'));
  }
}
