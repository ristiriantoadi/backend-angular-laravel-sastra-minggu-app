<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Entri;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LaporanPemuatanController extends Controller{

    public function addEntri(Request $request){

        $entri = Entri::create([
            'nama_pengarang' => $request->namaPengarang,
            'judul_karya'=>$request->judul,
            'jenis_karya'=>$request->jenisKarya,
            'media'=>$request->media,
            'tanggal_muat'=>$request->tanggalMuat,
            'user_id_pembuat_entri'=>Auth::user()->id,
            'user_id_pengarang'=>$request->idPengarang,
        ]);

        if($entri){
        
            $filename = $request->file('fileBuktiPemuatan')->getClientOriginalName();
            $file = $request->file('fileBuktiPemuatan')->storeAs("public/bukti_pemuatan/".$entri->id,$filename);
            
            if($file){

                $entri = DB::table('entris')
                ->where('id', $entri->id)
                ->update(['bukti_pemuatan' => $filename]);

                if($entri){
                    return response()->json([
                        'message' => 'success',
                        'entri' => $entri,
                    ]);
                }
            }
        }
        
        return response()->json([
            'message' => 'error'
        ]);

    }

    public function getEntri(Request $request){

        $entris_with_pengarang_in_system = DB::table('entris')
            ->join('users', 'users.id', '=', 'entris.user_id_pengarang')
            ->select('users.nama_lengkap', 'entris.id', 'entris.judul_karya','entris.jenis_karya','entris.media',
            'entris.tanggal_muat','entris.bukti_pemuatan')
            ->get();

        $entris_without_pengarang_in_system = DB::table('entris')->where('user_id_pengarang', '=', 0)
        ->select('entris.nama_pengarang AS nama_lengkap','entris.id', 'entris.judul_karya','entris.jenis_karya','entris.media',
        'entris.tanggal_muat','entris.bukti_pemuatan')
        ->get();

        $entris=$entris_with_pengarang_in_system->merge($entris_without_pengarang_in_system);

        return response()->json([
            'entris' => $entris
        ]);
    }

    public function getPengarang(Request $request){
        
        if ($request->has('nama-pengarang')) {
            
            $users = User::where('nama_lengkap', 'like', "%{$request->input('nama-pengarang')}%")->where('role','!=','admin')->get();
            
            return response()->json([
                'pengarangs' => $users,
                'message' => 'success',
             ]);
        }
    }

    public function deleteEntri(Request $request){
        
        $entri = Entri::find($request->id);
        
        if($entri->delete()){
            return response()->json([
                'message' => 'success'
             ]);
        }
        return response()->json([
            'message' => 'error'
         ]);
    }

    public function getEntriEdit(Request $request){
        
        if ($request->has('id')) {
            
            $entri = Entri::find($request->id);
            
            if($entri){
                
                return response()->json([
                    'message' => 'success',
                    'entri'=>$entri
                 ]);
            }
        }
        
        return response()->json([
            'message' => 'error'
         ]);
    }
}
