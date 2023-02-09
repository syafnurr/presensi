<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $hariini = date("Y-m-d");
        $nik = Auth::guard('siswa')->user()->nik;
        $presensihariini = DB::table('presensi')->where('nik', $nik)->where('tgl_presensi', $hariini)->first();
        // return view('dashboard.dashboard', compact('presensihariini'));
        return view('dashboard.dashboard')->with([
            'presensihariini' => $presensihariini
        ]);
    }
}
