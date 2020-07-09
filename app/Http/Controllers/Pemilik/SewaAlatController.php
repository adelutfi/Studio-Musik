<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Studio;
use App\SewaAlat;
use Auth;

class SewaAlatController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:pemilik');
    }

    public function index(){
      $sewaAlat = SewaAlat::orderBy('id', 'DESC')->get();
      return view('home.pemilik.sewa-alat.index', compact('sewaAlat'));
    }

    public function create(){
      $studio = Studio::orderBy('id','DESC')->where('id_pemilik',Auth::user()->id)->where('status', 1)->get();

      return view('home.pemilik.sewa-alat.tambah', compact('studio'));
    }

    public function store(Request $request){
      $rule = [
        'harga' => 'required|',
        'jadwal.*' => 'required',
        'keterangan' => 'required'
      ];

      $message = [
        'required' => ':attribute tidak boleh kosong.',
      ];

      $this->validate($request, $rule, $message);

      SewaAlat::create([
        'id_studio' => $request->id_studio,
        'harga' => $request->harga,
        'keterangan' => $request->keterangan,
        'jadwal' => implode(',',$request->jadwal),
      ]);

      return redirect()->route('pemilik.sewa-alat');
    }

    public function edit(SewaAlat $sewaAlat){
      $studio = Studio::orderBy('id','DESC')->where('id_pemilik',Auth::user()->id)->where('status', 1)->get();
      $jadwal = explode(',',$sewaAlat->jadwal);
      return view('home.pemilik.sewa-alat.edit', compact('sewaAlat','studio','jadwal'));
    }

    public function update(Request $request, SewaAlat $sewaAlat){
      $rule = [
        'harga' => 'required|',
        'jadwal.*' => 'required',
        'keterangan' => 'required'
      ];

      $message = [
        'required' => ':attribute tidak boleh kosong.',
      ];

      $this->validate($request, $rule, $message);

      $sewaAlat->update([
        'id_studio' => $request->id_studio,
        'harga' => $request->harga,
        'keterangan' => $request->keterangan,
        'jadwal' => implode(',',$request->jadwal),
      ]);

      return redirect()->route('pemilik.sewa-alat');
    }
}
