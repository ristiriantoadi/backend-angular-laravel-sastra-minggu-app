<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Entri;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LaporanPemuatanController extends Controller{

    public function addEntri(Request $request){

        error_log(sys_get_temp_dir());

        //Get the user id of the pengarang. For now let's just default it to 1
        error_log($request->idPengarang);

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

        //get entri and the pengarang of entri
        $entris_with_pengarang_in_system = DB::table('entris')
            ->join('users', 'users.id', '=', 'entris.user_id_pengarang')
            // ->select('users.*', 'contacts.phone', 'orders.price')
            ->select('users.nama_lengkap', 'entris.id', 'entris.judul_karya','entris.jenis_karya','entris.media',
            'entris.tanggal_muat')
            ->get();

        $entris_without_pengarang_in_system = DB::table('entris')->where('user_id_pengarang', '=', 0)
        ->select('entris.nama_pengarang AS nama_lengkap','entris.id', 'entris.judul_karya','entris.jenis_karya','entris.media',
        'entris.tanggal_muat')
        ->get();

        $entris=$entris_with_pengarang_in_system->merge($entris_without_pengarang_in_system);

        // $entris=array_merge($entris_with_pengarang_in_system,$entris_without_pengarang_in_system);


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
}
