<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;
use Carbon\Carbon;
use DB;

class DataStudioController extends Controller
{
    public function index(){
      $studio = Studio::where('status',1)->orderBy('id','DESC')->limit(6)->get();
      $rating = [];
      $semuaStudio = Studio::all();
      if($semuaStudio){
        foreach ($semuaStudio as $data) {
        $total = $data->ratings->nilai/$data->ratings->jumlah;
          if($total > 2){
            $rating[] = $data;
          }
        }
      }

      $rating = array_splice($rating, 0, 4);

      return view('welcome', compact('studio','rating'));
    }

    public function show(Studio $studio){
      return view('detail-studio', compact('studio'));
    }

    public function filter(Request $request){
     $studio = Studio::where('status',1)->orderBy('id','DESC')->paginate(8);
     // $hari = Carbon::now()->isoFormat('dddd');
     $hari = $request->get('ket');
     $rating = $request->get('rating');
     // dd($rating);
      if($request->get('ket') === 'sewa-tempat'){
        if($rating){
          $studio = Studio::whereHas('sewaTempat', function($query){
            $query->where('di_buat', '<>', null);
          })
          ->whereHas('ratings', function($query) use ($rating){
            $query->where(DB::raw('round(nilai/jumlah, 0)'), $rating);
          })
          ->where('status',1)->orderBy('id','DESC')->paginate(8);
        }else {
          $studio = Studio::whereHas('sewaTempat', function($query){
            $query->where('di_buat', '<>', null);
          })->where('status',1)->orderBy('id','DESC')->paginate(8);
        }
      }

      else if($request->get('ket') === 'sewa-alat') {
        if($rating){
          $studio = Studio::whereHas('sewaTempat', function($query){
            $query->where('di_buat', '<>', null);
          })
          ->whereHas('ratings', function($query) use ($rating){
            $query->where(DB::raw('round(nilai/jumlah, 0)'), $rating);
          })
          ->where('status',1)->orderBy('id','DESC')->paginate(8);
        }else {
          $studio = Studio::whereHas('sewaAlat', function($query){
            $query->where('di_buat', '<>', null);
          })->where('status',1)->orderBy('id','DESC')->paginate(8);
        }
      }else if($request->get('ket') !== 'sewa-tempat' || $request->get('ket') !== 'sewa-alat') {
        if($rating){
          $studio = Studio::whereHas('sewaTempat', function($query) use ($hari){
            $query->where('di_buat', '<>', null)->where('jadwal','LIKE','%'.$hari.'%');
          })
          ->whereHas('ratings', function($query) use ($rating){
            $query->where(DB::raw('round(nilai/jumlah, 0)'), $rating);
          })
          ->where('status',1)->orderBy('id','DESC')->paginate(8);
        }else {
          $studio = Studio::whereHas('sewaTempat', function($query) use ($hari){
            $query->where('di_buat', '<>', null)->where('jadwal','LIKE','%'.$hari.'%');
          })->where('status',1)->orderBy('id','DESC')->paginate(8);
        }
      }else{
         $studio = Studio::whereHas('ratings', function($query) use ($rating){
            $query->where(DB::raw('round(nilai/jumlah, 0)'), $rating);
          })
          ->where('status',1)->orderBy('id','DESC')->paginate(8);
      }


       return view('studio', compact('studio'));
    }

    public function semuaStudio(){
       $studio = Studio::where('status',1)->orderBy('id','DESC')->paginate(8);
       return view('studio', compact('studio'));
    }

    public function search(Request $request){
      $nama = $request->nama;
      $studio = Studio::where('status',1)->where('nama','LIKE','%'.$nama.'%')->orderBy('id','DESC')->paginate(8);
      return view('studio', compact('studio'));
    }
}
