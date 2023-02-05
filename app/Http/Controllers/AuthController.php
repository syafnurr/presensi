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
            return redirect('/')->with(['warning' => 'NIK/Password Salah']);
        }
    }

    public function logout(){
        if(Auth::guard('siswa')->check()){
            Auth::guard('siswa')->logout();
            return redirect('/');
        }
    }
}
