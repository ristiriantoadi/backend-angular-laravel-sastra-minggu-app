<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPemuatanController extends Controller{

    public function addEntri(Request $request){
        error_log($request->file('fileBuktiPemuatan'));
    }
}
