<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;

class DataStudioController extends Controller
{
    public function index(){
      $studio = Studio::where('status',1)->limit(3)->get();
      $rating = [];
      $semuaStudio = Studio::all();
      foreach ($semuaStudio as $data) {
        $total = ceil($data->ratings->sum('nilai')/count($data->ratings));
        if($total > 2){
          $rating[] = $data;
        }
      }

      $rating = array_splice($rating, 0, 4);

      return view('welcome', compact('studio','rating'));
    }

    public function show(Studio $studio){
      return view('detail-studio', compact('studio'));
    }
}
