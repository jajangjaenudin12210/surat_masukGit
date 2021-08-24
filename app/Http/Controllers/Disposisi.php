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

class Disposisi extends Controller
{
    // public function listDisposisi(){
    //     $data['surat_masuk'] = M_Surat_masuk::where('status', '2')->paginate(10);

    //     return view('disposisi.listDis',$data);
    // }

    public function listDisposisi(){
        $key = env('APP_KEY');
        $token = Session::get('token');
        $tokenDb = M_Admin::where('token', $token)->count();
        $decode = JWT::decode($token,$key,array('HS256'));
        $decode_array = (array) $decode;

        if($tokenDb > 0){
            $disposisi = M_Disposisi::where('id_admin', $decode_array['id_admin'])->get();

            $dataArr = array();
            foreach ($disposisi as $d) {
                $surat_masuk = M_Surat_masuk::where('id_surat_masuk',$d->id_surat_masuk)->first();
                $adm = M_Admin::where('id_admin', $decode_array['id_admin'])->first();



                $dataArr[] = array(
                    "id_disposisi" => $disposisi->id_disposisi,
                    "id_surat_masuk" => $surat_masuk->id_surat_masuk,
                    "id_admin" => $surat_masuk->id_admin,
                    "asal_surat_masuk" => $surat_masuk->asal_surat_masuk,
                    "no_surat_masuk" => $surat_masuk->no_surat_masuk,
                    "perihal_surat_masuk" => $surat_masuk->perihal_surat_masuk,
                    "tgl_surat_masuk" => $surat_masuk->tgl_surat_masuk,
                     // 'file_surat_masuk' => $path,
                    "tgl_terima" => $surat_masuk->tgl_terima,
                    "no_agenda" => $surat_masuk->no_agenda,
                    "sifat_surat" => $surat_masuk->sifat_surat,
                    "instruksi" => $disposisi->instruksi,
                    "tgl_instruksi" => $disposisi->tgl_instruksi,
                    "penerima_instruksi" => $disposisi->penerima_instruksi 

                );
            }
            $data['disposis'] = $dataArr;
            // $sup = M_Suplier::where('id_suplier',$decode_array['id_suplier'])->first();
            // $data['nama_usaha'] = $sup->nama_usaha;
            return view('suplier.riwayat_pengajuan',$data);

        
        }else{
            return redirect ('/listSuplier')->with('gagal','Pengajuan Sudah Pernah Dilakukan');
        }
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
                        return redirect ('/listDisposisi')->with('berhasil','Pengajuan Berhasil, Mohon Ditunggu');
                }else{
                    return redirect ('/listDisposisi')->with('gagal','Pengajuan Sudah Pernah Dilakukan');
                }
        }else{
            return redirect ('/')->with('gagal','Anda Sudah logout, silahkan login kembali');
        }
    }


}
