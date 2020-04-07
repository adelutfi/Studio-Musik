<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;

class AuthAdminController extends Controller
{
    public function login(Request $request){
      $dataInput = [
        'username' => $request->username,
        'password' => $request->password
      ];

      if(Auth::guard('admin')->attempt($dataInput)){
        return redirect('/admin');
      }
      return redirect()->back();
    }
}
