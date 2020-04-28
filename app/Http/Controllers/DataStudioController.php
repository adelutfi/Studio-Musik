<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;

class DataStudioController extends Controller
{
    public function index(){
      $studio = Studio::where('status',1)->paginate(4);
      return view('welcome', compact('studio'));
    }

    public function show(Studio $studio){
      return view('detail-studio', compact('studio'));
    }
}
