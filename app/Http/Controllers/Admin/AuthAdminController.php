<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;

class AuthAdminController extends Controller
{

  public function __construct()
    {
      $this->middleware('guest:admin')->except(['logout']);
    }

    public function login(Request $request){
      $dataInput = [
        'username' => $request->username,
        'password' => $request->password
      ];

      if(Auth::guard('admin')->attempt($dataInput)){
        return redirect()->route('admin.beranda');
      }
      return redirect()->back();
    }

    public function showLogin(){
      return view('auth.admin-login');
    }

    public function logout(){
      Auth::guard('admin')->logout();
      return redirect()->route('admin.login');
    }
}
