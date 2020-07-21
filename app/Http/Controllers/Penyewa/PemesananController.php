<?php

namespace App\Http\Controllers\Penyewa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PemesananTempat;
use App\PemesananAlat;
use App\Studio;
use Auth;
use Carbon\Carbon;

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
      $pemesanan = PemesananAlat::where('id_penyewa', Auth::user()->id)->orderBy('id','DESC')->paginate(6);
      // dd($pemesanan);
      return view('pemesanan-alat', compact('pemesanan'));
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
        'no_transaksi' => $request->no_transaksi,
        'harga' => $studio->sewaTempat->harga,
        'durasi' => $request->durasi,
        'tanggal' => $tanggal,
        'waktu' => $request->waktu,
        'ruangan' => $request->ruangan,
        'snap_token' => $request->snap_token
      ]);

      return redirect()->route('pemesanan.tempat');

    }
    public function storePemesananAlat(Request $request, Studio $studio){

      $tanggalMulai = strtotime($request->tanggal_mulai);
      $tanggalSelesai = strtotime($request->tanggal_selesai);

      $tanggalMulai = date('Y-m-d',$tanggalMulai);
      $tanggalSelesai = date('Y-m-d',$tanggalSelesai);
      // dd($tanggalMulai);

      PemesananAlat::create([
        'no_transaksi' => $request->no_transaksi,
        'id_penyewa' => Auth::user()->id,
        'id_studio' => $studio->id,
        'harga' => $studio->sewaAlat->harga,
        'tanggal_mulai' => $tanggalMulai,
        'tanggal_selesai' => $tanggalMulai,
        'nama' => $request->nama,
        'no_telp' => $request->no_telp,
        'alamat' => $request->alamat,
        'snap_token' => $request->snap_token
      ]);

      return redirect()->route('pemesanan.alat');
    }

}
