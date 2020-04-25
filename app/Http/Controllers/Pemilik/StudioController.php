<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Studio;

class StudioController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:pemilik');
    }

    public function index(){
      $studio = Studio::orderBy('id','DESC')->where('id_pemelik',Auth::user()->id)->get();

      return view('home.pemilik.studio.index', compact('studio'));
    }

    public function create(){
      $user = Auth::user();
      if($user->verifikasi_email && $user->no_rek){
        return view('home.pemilik.studio.tambah-studio');
      }

      return redirect()->back()->with('message','Verikasi Email & Lengkapi Profil anda.');
    }

    public function store(Request $request){
      $rule = [
        'nama' => 'required|min:3',
        'alamat' => 'required|min:5',
        'gambar' => 'image|max:2048|mimes:jpg,png,jpeg',
        'deskripsi' => 'required|min:5'
      ];

      $message = [
        'required' => ':attribute tidak boleh kosong.',
        'image.max' => 'Gambar Maksimal 2 MB',
        'min' => 'terlaku pendek',
        'max' => 'dengan benar'
      ];

      $this->validate($request, $rule, $message);

      $gambar = $request->file('gambar')->store('images/studio');

      Studio::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'deskripsi' => $request->deskripsi,
        'gambar' => $gambar,
        'id_pemelik' => Auth::user()->id
      ]);

      return redirect()->route('pemilik.studio')->with('message','Studio berhasil ditambahkan, Tunggu konfirmasi dari admin');
    }
}