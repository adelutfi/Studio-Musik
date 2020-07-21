<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;
use Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\PemesananAlat;
use App\PemesananTempat;

class PemesananController extends Controller
{
     public function __construct()
  {
    $this->middleware('auth:penyewa')->except(['notificationHandler']);
  }

  // public function notificationHandler(){
  //
  // }

  public function paymentGateway(Request $request){
    $serverKey = config('app.midtrans_server');
    $noTransaksi = Carbon::now()->format('Ymdhis');
    $total = $request->get('total');

    $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'Authorization' => 'Basic '.base64_encode($serverKey.':'),
    ];

    $json = [
      'transaction_details' => [
        'order_id' => $noTransaksi,
        'gross_amount' => (int) $total
      ],
        'customer_details' => [
          'first_name' => Auth::user()->nama,
        ]
    ];

    $client = new Client();
    $res = $client->post('https://app.sandbox.midtrans.com/snap/v1/transactions', [
      'headers' => $headers,
      'json' => $json
    ]);

    return response()->json([
      'status' => true,
      'no_transaksi' => $noTransaksi,
      'midtrans' => json_decode($res->getBody()->getContents())
    ]);

  }

  public function index(Request $request, Studio $studio){
    if(Auth::user()->no_telp && Auth::user()->alamat){
      if($request->keterangan == 'sewa-alat'){
        if(Auth::user()->konfirmasi_ktp){
          $keterangan = "sewa-alat";
          return view('pemesanan', compact('studio','keterangan'));
        }else{
        return redirect()->back()->with('message','Ktp anda belum di konfirmasi oleh admin');
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

  public function pemesananTempat(){
    $tanggal = Carbon::parse(request()->get('tanggal'))->format('Y-m-d');
    $pemesanan = PemesananTempat::whereDate('tanggal', $tanggal)->get(['waktu','durasi','ruangan']);

    return $pemesanan;
  }

}
