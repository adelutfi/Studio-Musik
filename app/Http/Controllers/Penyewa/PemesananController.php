<?php

namespace App\Http\Controllers\Penyewa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PemesananTempat;
use App\PemesananAlat;
use App\Studio;
use Auth;

class PemesananController extends Controller
{
    public function __construct(){
      $this->middleware('auth:penyewa');
    }

    public function pemesananTempat(){
      $pemesanan = PemesananTempat::where('id_penyewa', Auth::user()->id)->orderBy('id','DESC')->paginate(6);
      return view('pemesanan-tempat', compact('pemesanan'));
    }

    public function pemesananAlat(){
      return view('pemesanan-alat');
    }

    public function storePemesananTempat(Request $request, Studio $studio){

      Auth::user()->update([
        'nama' => $request->nama,
        'no_telp' => $request->no_telp,
        'alamat' => $request->alamat
      ]);
      $tanggal = strtotime($request->tanggal);

      $tanggal = date('Y-m-d',$tanggal);
      PemesananTempat::create([
        'id_penyewa' => Auth::user()->id,
        'id_studio' => $studio->id,
        'harga' => $studio->sewaTempat->harga,
        'durasi' => $request->durasi,
        'tanggal' => $tanggal,
        'waktu' => $request->waktu,
        'ruangan' => $request->ruangan,
        'pembayaran' => $request->pembayaran
      ]);

      return redirect()->route('pemesanan.tempat');

    }
}
