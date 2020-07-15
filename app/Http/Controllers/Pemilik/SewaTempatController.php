<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Studio;
use App\SewaTempat;
use Auth;

class SewaTempatController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:pemilik');
    }

    public function index(){
      $sewaTempat = SewaTempat::with('studio')->whereHas('studio', function($query){
        $query->where('id_pemilik', Auth::user()->id);
      })->orderBy('id', 'DESC')->get();
      return view('home.pemilik.sewa-tempat.index',compact('sewaTempat'));
    }

    public function create(){
      $studio = Studio::orderBy('id','DESC')->where('id_pemilik',Auth::user()->id)->where('status', 1)->get();

      return view('home.pemilik.sewa-tempat.tambah', compact('studio'));
    }

    public function store(Request $request){
      $rule = [
        'harga' => 'required|',
        'jam_tutup.*' => 'required',
        'jam_buka.*' => 'required',
        'jadwal.*' => 'required',
        'jumlah_ruangan' => 'required',
        'keterangan' => 'required'
      ];

      $message = [
        'required' => ':attribute tidak boleh kosong.',
      ];

      $this->validate($request, $rule, $message);

      SewaTempat::create([
        'id_studio' => $request->id_studio,
        'harga' => $request->harga,
        'jumlah_ruangan' => $request->jumlah_ruangan,
        'keterangan' => $request->keterangan,
        'jadwal' => implode(',',$request->jadwal),
        'jam_buka' => implode(',',$request->jam_buka),
        'jam_tutup' => implode(',',$request->jam_tutup),
      ]);

      return redirect()->route('pemilik.sewa-tempat')->with('message','Sewa Tempat berhasil ditambahkan');
    }

    public function edit(SewaTempat $sewaTempat){
      $studio = Studio::orderBy('id','DESC')->where('id_pemilik',Auth::user()->id)->where('status', 1)->get();
      $jadwal = explode(',',$sewaTempat->jadwal);
      $jamBuka = explode(',',$sewaTempat->jam_buka);
      $jamTutup = explode(',',$sewaTempat->jam_tutup);
      // dd($jadwal);
      return view('home.pemilik.sewa-tempat.edit', compact('sewaTempat', 'studio', 'jadwal','jamBuka','jamTutup'));
    }

    public function update(Request $request, SewaTempat $sewaTempat){
      $rule = [
        'harga' => 'required|',
        'jam_tutup.*' => 'required',
        'jam_buka.*' => 'required',
        'jadwal.*' => 'required',
        'jumlah_ruangan' => 'required',
        'keterangan' => 'required'
      ];

      $message = [
        'required' => ':attribute tidak boleh kosong.',
      ];

      $this->validate($request, $rule, $message);

      $sewaTempat->update([
        'id_studio' => $request->id_studio,
        'harga' => $request->harga,
        'jumlah_ruangan' => $request->jumlah_ruangan,
        'keterangan' => $request->keterangan,
        'jadwal' => implode(',',$request->jadwal),
        'jam_buka' => implode(',',$request->jam_buka),
        'jam_tutup' => implode(',',$request->jam_tutup),
      ]);

      return redirect()->route('pemilik.sewa-tempat')->with('message','Sewa Tempat berhasil diubah');
    }

    public function destroy(SewaTempat $sewaTempat){
      $sewaTempat->delete();
      return redirect()->route('pemilik.sewa-tempat')->with('message','Sewa Tempat berhasil dihapus');
    }


}
