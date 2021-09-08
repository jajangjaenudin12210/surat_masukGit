<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use \Firebase\JWT\JWT;

use Illuminate\Response;

use Illuminate\Support\Facades\Validator;

use Illuminate\Contacts\Encryption\DecryptException;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

//import model admin
use App\M_Admin;

use App\M_Surat_masuk;

use App\M_Disposisi;

use DB;

class Disposisi extends Controller
{

    public function listDisposisi(){

        $data['disposisi'] = M_Disposisi::with('suratMasuk')->get();
 
        return view('disposisi.listDis')->with('disposisi', $data['disposisi']);
    }


    public function tambahDisposisi(Request $request){
        
        $token = Session::get('token');
        $tokenDb = M_Admin::where('token', $token)->count();
        
        if($tokenDb > 0){
            $this->validate($request,
                [
                    'id_surat_masuk' => 'required',
                    // 'id_admin' => 'required',
                    'instruksi' => 'required',
                    'tgl_instruksi' => 'required',
                    'penerima_instruksi' => 'required'
                ]
            );

                $adm = M_Admin::where('token', $token)->first();
                    if(M_Disposisi::create(
                    [
                        'id_surat_masuk' => $request->id_surat_masuk,
                        'id_admin' => $adm->id_admin,
                        'instruksi' => $request->instruksi,
                        'tgl_instruksi' => $request->tgl_instruksi,
                        'penerima_instruksi' => $request->penerima_instruksi
                    ])){
                        M_Surat_masuk::where('id_surat_masuk',$request->id_surat_masuk)->update(["status" =>"3"]);
                        return redirect ('/suratNaik')->with('berhasil','Pengajuan Berhasil, Mohon Ditunggu');
                }else{
                    return redirect ('/tambahSurat')->with('gagal','Pengajuan Sudah Pernah Dilakukan');
                }
        }else{
            return redirect ('/')->with('gagal','Anda Sudah logout, silahkan login kembali');
        }
    }

    public function tambahDis(Request $request, $id){
        $token = Session::get('token');
        $tokenDb = M_Admin::where('token', $token)->count();
        
        $dataSM = M_Surat_masuk::findOrFail($id);
        return view('disposisi.tambahDis', compact ('dataSM'));
    }

}
