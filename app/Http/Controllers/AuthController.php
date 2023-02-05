<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        // $pass = 123;
        // echo Hash::make($pass);
        if(Auth::guard('siswa')->attempt(['nik'=> $request->nik, 'password'=>$request->password])) {
            return redirect('/dashboard');
        } else {
            echo "Gagal Login";
        }
    }
}
