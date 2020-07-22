<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PemesananTempat;
use App\PemesananAlat;
use Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PemesananController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:pemilik');
  }

  public function pemesananTempat(){
    $pemesanan = PemesananTempat::with('studio')->whereHas('studio', function($query){
      $query->where('id_pemilik', Auth::user()->id);
    })->orderBy('id', 'DESC')->get();

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

    return view('home.pemilik.pemesanan.pemesanan-tempat', compact('pemesanan', 'status'));
  }

  public function pemesananAlat(){
    $pemesanan = PemesananAlat::with('studio')->whereHas('studio', function($query){
      $query->where('id_pemilik', Auth::user()->id);
    })->orderBy('id', 'DESC')->get();

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

    return view('home.pemilik.pemesanan.pemesanan-alat', compact('pemesanan', 'status'));
  }
}
