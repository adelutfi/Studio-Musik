<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;
use Auth;
use Carbon\Carbon;

class PemesananController extends Controller
{
     public function __construct()
  {
    $this->middleware('auth:penyewa');
  }

  public function index(Request $request, Studio $studio){
    if(Auth::user()->no_telp && Auth::user()->alamat){
      if($request->keterangan == 'sewa-alat'){
        if(Auth::user()->konfirmasi_ktp){
          $keterangan = "sewa-alat";
          return view('pemesanan', compact('studio','keterangan'));
        }else{
        return redirect()->back()->with('message','Sepertinya Ktp anda belum di konfirmasi oleh admin');
        }
      }elseif ($request->keterangan == 'sewa-tempat') {
        $keterangan = "sewa-tempat";
        $jadwal = explode(',',$studio->sewaTempat->jadwal);
        $jamBuka = explode(',',$studio->sewaTempat->jam_buka);
        $jamTutup = explode(',',$studio->sewaTempat->jam_tutup);
        $tanggal = [];

        foreach ($jadwal as $key => $value) {
          for ($i=0; $i < 23 ; $i++) {
              $carbon = Carbon::now();
            if($carbon->add($i, 'day')->isoFormat('dddd') == $value){
              $tanggal[] = (object) [
                'date' => $carbon->isoFormat('D-M-Y'),
                'day' => $carbon->isoFormat('dddd'),
                'opened' => $jamBuka[$key],
                'closed' => $jamTutup[$key],
               ];
            }
          }
        }
        usort($tanggal, function($a, $b) {
          return strtotime($a->date) - strtotime($b->date);
        });

        return view('pemesanan', compact('studio','keterangan', 'tanggal','jamBuka','jamTutup','jadwal'));
      }else {
        return redirect('detail/'.$studio->id);
      }
    }else {
      return redirect()->back()->with('message','Lengkapi dulu profil anda');
    }

  }

}
