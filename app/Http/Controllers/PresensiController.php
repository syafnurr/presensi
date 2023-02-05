<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PresensiController extends Controller
{
    public function create() {
        return view(('presensi.create'));
    }

    public function store(Request $request) {
        $nik = Auth::guard('siswa')->user()->nik;
        $tgl_presensi = date("Y-m-d");
        $jam = date("H:i:s");
        $lokasi = $request->lokasi;
        $image = $request->image;
        // echo $image;
        // die;
        $folderPath = "public/uploads/absensi/";
        $formatName = $nik . "-" . $tgl_presensi;
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . "png";
        $file = $folderPath . $fileName;
        
        $data = [
            'nik' => $nik,
            'tgl_presensi' => $tgl_presensi,
            'jam_in' => $jam,
            'foto_in' => $fileName,
            'lokasi' => $lokasi
        ];
        $simpan = DB::table('presensi')->insert($data);
        if($simpan){
            echo 0;
            Storage::put($file, $image_base64);
        } else {
            echo 1;
        }
    }
}
