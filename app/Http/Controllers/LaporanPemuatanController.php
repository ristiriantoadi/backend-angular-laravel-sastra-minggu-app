<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPemuatanController extends Controller{

    public function addEntri(Request $request){
        

        



        //uploading file
        $savePath = "public/bukti_pemuatan";
        $request->file('fileBuktiPemuatan')->storeAs($savePath,"file_laporan.pdf");
        $request->file("file_kartu_kontrol")->storeAs($savePath,"file_kartu_kontrol.pdf");
        $request->file("file_surat_puas")->storeAs($savePath,"file_surat_puas.pdf");
        $request->file("file_krs")->storeAs($savePath,"file_krs.pdf");
    }
}
