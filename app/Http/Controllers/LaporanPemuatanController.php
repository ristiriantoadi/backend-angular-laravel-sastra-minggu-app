<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Entri;

class LaporanPemuatanController extends Controller{

    public function addEntri(Request $request){
        
        // $entri = new Entri;        
        // $entri->nama_pengarang = $request->namaPengarang;
        // $entri->judul_karya = $request->judul;
        // $entri->jenis_karya = $request->jenisKarya;
        // $entri->media = $request->media;
        // $entri->tanggal_muat = $request->tanggalMuat;
        // $entri->user_id_pembuat_entri = Auth::user()->id;

        // $entri->user_id_pengarang = 1;
        // $entri = $entri->save();
        // error_log($entri);

        //Get the user id of the pengarang. For now let's just default it to 1
        

        $entri = Entri::create([
            'nama_pengarang' => $request->namaPengarang,
            'judul_karya'=>$request->judul,
            'jenis_karya'=>$request->jenisKarya,
            'media'=>$request->media,
            'tanggal_muat'=>$request->tanggalMuat,
            'user_id_pembuat_entri'=>Auth::user()->id,
            'user_id_pengarang'=>1,
        ]);

        if($entri){
    
            //uploading file
            //for now the default file format is jpg. we will change this later
            $file = $request->file('fileBuktiPemuatan')->storeAs("public/bukti_pemuatan",
            $entri->id.".jpg");
            if($file){
                return response()->json([
                    'message' => 'success',
                    'entri' => $entri,
                ]);
            }
        }
        
        return response()->json([
            'message' => 'error'
        ]);

    }

    public function getEntri(Request $request){
        return response()->json([
            'entris' => Entri::all()
        ]);
    }
}
