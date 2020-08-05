<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;
use Carbon\Carbon;
use App\Rating;
use DB;

class DataStudioController extends Controller
{
    public function index(){
      $studio = Studio::where('status',1)->whereHas('sewaTempat')->orWhereHas('sewaAlat')->limit(6);
      return view('welcome', compact('studio'));
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
          ->whereHas('rating', function($query) use ($rating){
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
          ->whereHas('rating', function($query) use ($rating){
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
          ->whereHas('rating', function($query) use ($rating){
            $query->where(DB::raw('round(nilai/jumlah, 0)'), $rating);
          })
          ->where('status',1)->orderBy('id','DESC')->paginate(8);
        }else {
          $studio = Studio::whereHas('sewaTempat', function($query) use ($hari){
            $query->where('di_buat', '<>', null)->where('jadwal','LIKE','%'.$hari.'%');
          })->where('status',1)->orderBy('id','DESC')->paginate(8);
        }
      }else{
         $studio = Studio::whereHas('rating', function($query) use ($rating){
            $query->where(DB::raw('round(nilai/jumlah, 0)'), $rating);
          })
          ->where('status',1)->orderBy('id','DESC')->paginate(8);
      }


       return view('studio', compact('studio'));
    }

    public function semuaStudio(){
       $tanggal = request()->get('tanggal');
       $studio = Studio::where('status',1)->orderBy('id','DESC')->paginate(8);
       if($tanggal){
         $hari = Carbon::parse($tanggal)->isoFormat('dddd');

         $studio = Studio::whereHas('sewaTempat', function($query) use ($hari){
           $query->where('jadwal', 'LIKE', '%'.$hari.'%');
         })->where('status',1)->orderBy('id','DESC')->paginate(8);

         // dd($studio);
       }

       return view('studio', compact('studio'));
    }

    public function search(Request $request){
      $nama = $request->nama;
      $studio = Studio::where('status',1)->where('nama','LIKE','%'.$nama.'%')->orderBy('id','DESC')->paginate(8);
      return view('studio', compact('studio'));
    }
}
