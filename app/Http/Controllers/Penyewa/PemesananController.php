<?php

namespace App\Http\Controllers\Penyewa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PemesananTempat;
use App\PemesananAlat;
use App\Studio;
use Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PemesananController extends Controller
{
    public function __construct(){
      $this->middleware('auth:penyewa');
    }

    public function pemesananTempat(){
      $pemesanan = PemesananTempat::where('id_penyewa', Auth::user()->id)->orderBy('id','DESC')->paginate(6);
      $status = [];
      $serverKey = config('app.midtrans_server');
      $headers = [
          'Accept' => 'application/json',
          'Content-Type' => 'application/json',
          'Authorization' => 'Basic '.base64_encode($serverKey.':'),
      ];

      $client = new Client();

      foreach ($pemesanan as $p) {
        $res = $client->get('https://api.sandbox.midtrans.com/v2/'.$p->no_transaksi.'/status', [
          'headers' => $headers
        ]);
        $data = json_decode($res->getBody()->getContents(), true);
        $status[] = [
          'status' => $data['transaction_status'],
          'store' => $data['store']
        ];

      }

      return view('pemesanan-tempat', compact('pemesanan','status'));
    }

    public function pemesananAlat(){
      $pemesanan = PemesananAlat::where('id_penyewa', Auth::user()->id)->orderBy('id','DESC')->paginate(6);
      $status = [];
      $serverKey = config('app.midtrans_server');
      $headers = [
          'Accept' => 'application/json',
          'Content-Type' => 'application/json',
          'Authorization' => 'Basic '.base64_encode($serverKey.':'),
      ];

      $client = new Client();

      foreach ($pemesanan as $p) {
        $res = $client->get('https://api.sandbox.midtrans.com/v2/'.$p->no_transaksi.'/status', [
          'headers' => $headers
        ]);
        $data = json_decode($res->getBody()->getContents());
        $status [] = [
          'status' => $data->transaction_status,
          'store' => $data->store
        ];
      }

      return view('pemesanan-alat', compact('pemesanan', 'status'));
    }

    public function storePemesananTempat(Request $request, Studio $studio){

      Auth::user()->update([
        'nama' => $request->nama,
        'no_telp' => $request->no_telp,
        'alamat' => $request->alamat
      ]);
      $tanggal = strtotime($request->tanggal);

      if(request()->get('tanggal')){
        $tanggal = strtotime(request()->get('tanggal'));
      }

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

      if(request()->get('tanggal')){
        $tanggalMulai = strtotime(request()->get('tanggal'));
      }

      $tanggalMulai = date('Y-m-d',$tanggalMulai);
      $tanggalSelesai = date('Y-m-d',$tanggalSelesai);
      // dd($tanggalMulai);

      PemesananAlat::create([
        'no_transaksi' => $request->no_transaksi,
        'id_penyewa' => Auth::user()->id,
        'id_studio' => $studio->id,
        'harga' => $studio->sewaAlat->harga,
        'tanggal_mulai' => $tanggalMulai,
        'tanggal_selesai' => $tanggalSelesai,
        'nama' => $request->nama,
        'no_telp' => $request->no_telp,
        'alamat' => $request->alamat,
        'snap_token' => $request->snap_token
      ]);

      return redirect()->route('pemesanan.alat');
    }

}
