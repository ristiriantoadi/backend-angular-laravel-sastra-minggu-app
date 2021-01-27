<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Entri;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LaporanPemuatanController extends Controller{

    public function addEntri(Request $request){

        //insert new entri
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
            
            //upload file bukti pemuatan
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

        //the user needs editable boolean attribute added to entri
        //because can only edit the entri that they added
        //so user requirement is different from admin and guest
        if(Auth::check()){
            if(Auth::user()->role == "user"){
                return LaporanPemuatanController::getEntriUser();
            }
        }
        
        return response()->json([
            'entris' => LaporanPemuatanController::getAllEntri()
        ]);
    }

    public function getEntriUser(){
        $entris = LaporanPemuatanController::getAllEntri();
        
        foreach($entris as $entri) {
            if(Auth::user()->id == $entri->user_id_pembuat_entri)
                $entri->editable=true;
            else $entri->editable=false;
        }
        
        return response()->json([
            'entris' => $entris,
            'message' => 'success',
         ]);

    }

    public function getAllEntri(){
        $entris_with_pengarang_in_system = DB::table('entris')
            ->join('users', 'users.id', '=', 'entris.user_id_pengarang')
            ->select('users.nama_lengkap', 'entris.id', 'entris.judul_karya','entris.jenis_karya','entris.media',
            'entris.tanggal_muat','entris.bukti_pemuatan','entris.user_id_pengarang','entris.user_id_pembuat_entri')
            ->get();
        $entris_without_pengarang_in_system = DB::table('entris')->where('user_id_pengarang', '=', 0)
        ->select('entris.nama_pengarang AS nama_lengkap','entris.id', 'entris.judul_karya','entris.jenis_karya','entris.media',
        'entris.tanggal_muat','entris.bukti_pemuatan','entris.user_id_pengarang','entris.user_id_pembuat_entri')
        ->get();
        
        //merge and sort by date descending
        $entris=$entris_with_pengarang_in_system->merge($entris_without_pengarang_in_system);
        $entris = $entris->sortByDesc('tanggal_muat')->values()->all();;
        return $entris;
    }

    public function getPengarang(Request $request){
        
        //get list of pengarang
        if ($request->has('nama-pengarang')) {
            $users = User::where('nama_lengkap', 'like', "%{$request->input('nama-pengarang')}%")
            ->where('role','!=','admin')->get();
            return response()->json([
                'pengarangs' => $users,
                'message' => 'success',
             ]);
        }
    }

    public function deleteEntri(Request $request){
        
        //delete entri
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
        
        //get entri to be edited
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

    public function editEntri(Request $request){
        // error_log("edit entri called");
        if($request->file('file_bukti_pemuatan')){
            $filename = $request->file('file_bukti_pemuatan')->getClientOriginalName();
            DB::table('entris')
            ->where('id', $request->id_entri)
            ->update([
                'nama_pengarang' => $request->nama_pengarang,
                'judul_karya' => $request->judul,
                'jenis_karya' => $request->jenis_karya,
                'media' => $request->media,
                'tanggal_muat' => $request->tanggal_muat,
                'media' => $request->media,
                'user_id_pengarang'=>$request->id_pengarang,
                'bukti_pemuatan'=>$filename
            ]);
        }else{
            DB::table('entris')
            ->where('id', $request->id_entri)
            ->update([
                'nama_pengarang' => $request->nama_pengarang,
                'judul_karya' => $request->judul,
                'jenis_karya' => $request->jenis_karya,
                'media' => $request->media,
                'tanggal_muat' => $request->tanggal_muat,
                'media' => $request->media,
                'user_id_pengarang'=>$request->id_pengarang,
            ]);
        }

    }

    public function searchEntris(Request $request){
        $namaJudulMedia = $request->input('namaJudulMedia');
        $tanggalMuatAwal = $request->input('tanggalMuatAwal');
        $tanggalMuatAkhir = $request->input('tanggalMuatAkhir');

        
        $searchedByNamaPengarang = DB::table('entris')->whereBetween('tanggal_muat', [$tanggalMuatAwal,$tanggalMuatAkhir])
                    ->where('nama_pengarang','like',"%{$namaJudulMedia}%")
                    ->select('entris.nama_pengarang AS nama_lengkap', 'entris.id', 'entris.judul_karya',
                    'entris.jenis_karya','entris.media','entris.tanggal_muat','entris.bukti_pemuatan',
                    'entris.user_id_pengarang','entris.user_id_pembuat_entri')
                    ->get();
        $searchedByJudulKarya = DB::table('entris')->whereBetween('tanggal_muat', [$tanggalMuatAwal,$tanggalMuatAkhir])
                    ->where('judul_karya','like',"%{$namaJudulMedia}%")
                    ->select('entris.nama_pengarang AS nama_lengkap', 'entris.id', 'entris.judul_karya',
                    'entris.jenis_karya','entris.media','entris.tanggal_muat','entris.bukti_pemuatan',
                    'entris.user_id_pengarang','entris.user_id_pembuat_entri')
                    ->get();
        $searchedByMedia = DB::table('entris')->whereBetween('tanggal_muat', [$tanggalMuatAwal,$tanggalMuatAkhir])
                    ->where('media','like',"%{$namaJudulMedia}%")
                    ->select('entris.nama_pengarang AS nama_lengkap', 'entris.id', 'entris.judul_karya',
                    'entris.jenis_karya','entris.media','entris.tanggal_muat','entris.bukti_pemuatan',
                    'entris.user_id_pengarang','entris.user_id_pembuat_entri')
                    ->get();
        
        //merge and sort the data
        $entris=$searchedByNamaPengarang->merge($searchedByJudulKarya)->merge($searchedByMedia)->unique();
        $entris = $entris->sortByDesc('tanggal_muat')->values()->all(); 
        
        if(Auth::check()){
            if(Auth::user()->role == "user"){
                $entris=LaporanPemuatanController::setEditableOnEntris($entris);
            }
        }
        
        return response()->json([
            'message' => 'success',
            'entris'=>$entris
         ]);
    }

    function setEditableOnEntris($entris){
        foreach($entris as $entri) {
            if(Auth::user()->id == $entri->user_id_pembuat_entri)
                $entri->editable=true;
            else $entri->editable=false;
        }
        return $entris;
    }
}
