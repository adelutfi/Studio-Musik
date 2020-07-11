<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
  public function __construct()
  {
      $this->middleware('guest:pemilik');
  }

  public function index(){
    return view('auth.password.forgot-password-pemilik');
  }
}
