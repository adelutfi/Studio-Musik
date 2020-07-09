<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;

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

    public function semuaStudio(){
       $studio = Studio::where('status',1)->orderBy('id','DESC')->paginate(8);
       return view('studio', compact('studio'));
    }
}
