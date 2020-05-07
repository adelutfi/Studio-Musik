<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Studio;
use Auth;

class SewaTempatController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:pemilik');
    }

    public function index(){
      return view('home.pemilik.sewa-tempat.index');
    }

    public function create(){
      $studio = Studio::orderBy('id','DESC')->where('id_pemilik',Auth::user()->id)->where('status', 1)->get();
      return view('home.pemilik.sewa-tempat.tambah', compact('studio'));
    }

    public function store(Request $request){
      $rule = [
        'harga' => 'required|',
        'foto' => 'image|max:1024|mimes:jpg,png,jpeg',
        'alamat' => 'required|min:3'
      ];

      $message = [
        'required' => ':attribute tidak boleh kosong.',
        'min' => 'terlaku pendek',
        'max' => 'dengan benar'
      ];

      $this->validate($request, $rule, $message);

      dd($request->all());

    }
}
