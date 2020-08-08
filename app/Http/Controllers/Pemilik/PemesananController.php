<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PemesananTempat;
use App\PemesananAlat;
use Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use PDF;

class PemesananController extends Controller
{
  public $bulan = array(
    "01"=>"Januari",
    "02"=>"Februari",
    "03"=>"Maret",
    "04"=>"April",
    "05"=>"Mei",
    "06"=>"Juni",
    "07"=>"Juli",
    "08"=>"Agustus",
    "09"=>"September",
    "10"=>"Oktober",
    "11"=>"November",
    "12"=>"Desember");

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

    $bulan = $this->bulan;

    return view('home.pemilik.pemesanan.pemesanan-tempat', compact('pemesanan', 'status', 'bulan'));
  }

  public function pemesananAlat(){
    $bulan = $this->bulan;
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
        'status' => isset($data->transaction_status) ? $data->transaction_status : 'expire',
        'store' => isset($data->store) ? $data->store : 'Indomaret'
      ];
    }

    return view('home.pemilik.pemesanan.pemesanan-alat', compact('pemesanan', 'status', 'bulan'));
  }

  public function notifikasiPengiriman(PemesananAlat $pemesanan){
      $pemesanan->update(['status' => 0]);

      return redirect()->back();
  }

   public function notifikasiSelesai(PemesananAlat $pemesanan){
      $pemesanan->update(['status' => 1]);

      return redirect()->back();
  }

  public function pdfSewaAlat(){
    $bulan = $this->bulan;
    $selectBulan = request()->get('bulan');
    $selectTahun = request()->get('tahun');
    $namaBulan = $bulan[$selectBulan];
    $pemilik = Auth::user();

    $pemesanan = PemesananAlat::whereMonth('tanggal_mulai', $selectBulan)->whereYear('tanggal_mulai', $selectTahun)->get();

    if(count($pemesanan) > 0){
      $pdf = PDF::loadView('home.pemilik.pemesanan.pemesanan-alat-pdf',
      compact('pemesanan','namaBulan', 'pemilik'));
      return $pdf->stream();
    }else {
      return redirect()->back()->with('notfound', 'Data tidak ditemukan di bulan '.$namaBulan);
    }

    // return view('home.pemilik.pemesanan.pemesanan-alat-pdf', compact('pemesanan','namaBulan', 'pemilik'));

  }

  public function pdfSewaTempat(){
    $bulan = $this->bulan;
    $selectBulan = request()->get('bulan');
    $selectTahun = request()->get('tahun');
    $namaBulan = $bulan[$selectBulan];
    $pemilik = Auth::user();

    $pemesanan = PemesananTempat::whereMonth('tanggal', $selectBulan)->whereYear('tanggal', $selectTahun)->get();

    if(count($pemesanan) > 0){
      // return view('home.pemilik.pemesanan.pemesanan-tempat-pdf', compact('pemesanan','namaBulan', 'pemilik'));
      $pdf = PDF::loadView('home.pemilik.pemesanan.pemesanan-tempat-pdf',
      compact('pemesanan','namaBulan', 'pemilik'));
      return $pdf->stream();
    }else {
      return redirect()->back()->with('notfound', 'Data tidak ditemukan di bulan '.$namaBulan);
    }


  }
}
