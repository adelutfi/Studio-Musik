<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;
use Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PemesananController extends Controller
{
     public function __construct()
  {
    $this->middleware('auth:penyewa')->except(['notificationHandler']);
  }

  public function notificationHandler(){
    $json = file_get_contents('php://input');
    $action = json_decode($json, true);

    return $action;
  }

  public function testPayment(){
    $serverKey = config('app.midtrans_server');
    $clientKey = config('app.midtrans_client');
    $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'Authorization' => 'Basic '.base64_encode($serverKey.':'),
    ];

    $json = [
      'transaction_details' => [
        'order_id' => 'ORDER-103',
        'gross_amount' => (int) 10000
      ]
    ];

  // return $json;

    // dd($body);

    $client = new Client();
    $response = $client->post('https://app.sandbox.midtrans.com/snap/v1/transactions', [
      'headers' => $headers,
      'json' => $json
    ]);

    return $response->getBody()->getContents();

    // $req->setBody($json, 'application/json');

// $req->setBody($body);
// $response = $req->send();

// return $req;
// return $res;
    // $res
    // $request = new \GuzzleHttp\Psr7\Request('GET', 'http://resep-mau.herokuapp.com/api/users');
    // $promise = $client->sendAsync($request)->then(function ($response) {
    //   return $response->getBody()->getContents();
    // });
    // $promise->wait();
    // dd();
    return response()->json(json_decode($res->getBody()->getContents()));
    // return $promise;

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
