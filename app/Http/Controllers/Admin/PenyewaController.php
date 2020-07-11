<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penyewa;
use Auth;

class PenyewaController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    public function status(Penyewa $penyewa){
      $penyewa->update(['status' => !$penyewa->status]);
      $message = $penyewa->status ? 'Akun anda telah di aktifkan admin' : 'Akun anda telah di non aktifkan admin';
      Auth::user()->sendNotifyPenyewa($message, $penyewa->id);
      return redirect()->back()->with('message', $penyewa->status ? 'Penyewa berhasil di Aktifkan' : 'Penyewa berhasil di Non Aktifkan');
    }

    public function ktp(Penyewa $penyewa){
      $penyewa->update(['konfirmasi_ktp' => true]);
      return redirect()->back()->with('message', 'Ktp Penyewa berhasil dikonfirmasi');
    }
}
