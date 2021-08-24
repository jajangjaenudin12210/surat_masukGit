<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use \Firebase\JWT\JWT;

use Illuminate\Response;

use Illuminate\Support\Facades\Validator;

use Illuminate\Contacts\Encryption\DecryptException;

use Illuminate\Support\Facades\Storage;

//import model admin
use App\M_Admin;

use App\M_Surat_masuk;

class Surat_masuk extends Controller
{
    //
    public function tambahSurat(){
        $data['surat_masuk'] = M_Surat_masuk::where('status', '1')->paginate(10);
        return view('surat_masuk.list_surat_masuk',$data);
    }

    public function tambahSuratMasuk(Request $request){
    
        $token = Session::get('token');
        $tokenDb = M_Admin::where('token', $token)->count();
    

        if($tokenDb > 0){
            $this->validate($request,
                [
                    'asal_surat_masuk' =>'required',
                    'no_surat_masuk' => 'required',
                    'perihal_surat_masuk' => 'required',
                    'tgl_surat_masuk' => 'required',
                    'file_surat_masuk' => 'required|mimes:pdf,png,jpeg|max:10000',
                    'tgl_terima' => 'required',
                    'no_agenda' => 'required',
                    'sifat_surat' => 'required'
                ]
            );

                $path = $request->file('file_surat_masuk')->store('public/file_surat_masuk');

                if(M_Surat_masuk::create(
                [
                    'asal_surat_masuk' => $request->asal_surat_masuk,
                    'no_surat_masuk' => $request->no_surat_masuk,
                    'perihal_surat_masuk' => $request->perihal_surat_masuk,
                    'tgl_surat_masuk' => $request->tgl_surat_masuk,
                    'file_surat_masuk' => $path,
                    'tgl_terima' => $request->tgl_terima,
                    'no_agenda' => $request->no_agenda,
                    'sifat_surat' => $request->sifat_surat  

                ])){
                    return redirect ('/tambahSurat')->with('berhasil','Surat Masuk Berhasil Disimpan');
                }else{
                    return redirect ('/tambahSurat')->with('gagal','Surat Masuk Gagal Disimpan');
                }
            
        }else{
            return redirect ('/')->with('gagal','Anda Sudah logout, silahkan login kembali');
        }
    }

    public function hapusSuratMasuk($id){

        $token = Session::get('token');
        $tokenDb = M_Admin::where('token', $token)->count();
        if($tokenDb > 0){
            $surat_masuk = M_Surat_masuk::where('id_surat_masuk',$id)->count();
            if($surat_masuk > 0){
                $dataSuratMasuk = M_Surat_masuk::where('id_surat_masuk',$id)->first();
                if(Storage::delete($dataSuratMasuk->file_surat_masuk)){
                    if(M_Surat_masuk::where('id_surat_masuk',$id)->delete()){
                        return redirect ('/tambahSurat')->with('berhasil','Data Berhasil Dihapus');
                    }else{
                         return redirect ('/tambahSurat')->with('gagal','Data gagal Dihapus');
                    }
                }else{
                    return redirect ('/tambahSurat')->with('gagal','Data tidak ditemukan');

                }

            }else{
                return redirect ('/')->with('gagal','Data tidak ditemuka');
            }

        
        }else{
             return redirect ('/')->with('gagal','Token expired');
        }
    }

   

     public function ubahSM(Request $request, $id){
        $token = Session::get('token');
        $tokenDb = M_Admin::where('token', $token)->count();
        
        $dataSM = M_Surat_masuk::findOrFail($id);
        return view('surat_masuk.ubahSM', compact ('dataSM'));

    }

    public function ubahSuratMasuk(Request $request,$id){
        $token = Session::get('token');
        $tokenDb = M_Admin::where('token', $token)->count();

        if($tokenDb > 0){
            $this->validate($request,
                [
                    'u_asal_surat_masuk' =>'required',
                    'u_no_surat_masuk' => 'required',
                    'u_perihal_surat_masuk' => 'required',
                    'u_tgl_surat_masuk' => 'required',
                    // 'u_file_surat_masuk' => 'required|mimes:pdf,png,jpeg|max:10000',
                    'u_tgl_terima' => 'required',
                    'u_no_agenda' => 'required',
                    'u_sifat_surat' => 'required'

                ]
            );

           
            // $path = $request->file('u_file_surat_masuk')->store('public/file_surat_masuk');

            if(M_Surat_masuk::where('id_surat_masuk', $request->id_surat_masuk)->update(
                [
                    'asal_surat_masuk' => $request->u_asal_surat_masuk,
                    'no_surat_masuk' => $request->u_no_surat_masuk,
                    'perihal_surat_masuk' => $request->u_perihal_surat_masuk,
                    'tgl_surat_masuk' => $request->u_tgl_surat_masuk,
                     // 'file_surat_masuk' => $path,
                    'tgl_terima' => $request->u_tgl_terima,
                    'no_agenda' => $request->u_no_agenda,
                    'sifat_surat' => $request->u_sifat_surat
                ])){
                    if ($files = $request->file('u_file_surat_masuk')) {
                        $path = 'public/file_surat_masuk/'; // upload path
                        $file_surat_masuk = date('YmdHis') . "." . $files->getClientOriginalExtension();
                        $files->move($path, $file_surat_masuk);
                        $update['file_surat_masuk'] = "$file_surat_masuk";
                        

                        $update['asal_surat_masuk'] = $request->get('u_asal_surat_masuk');
                        $update['no_surat_masuk'] = $request->get('u_no_surat_masuk');
                        $update['perihal_surat_masuk'] = $request->get('u_perihal_surat_masuk');
                        $update['tgl_surat_masuk'] = $request->get('u_tgl_surat_masuk');
                        $update['tgl_terima'] = $request->get('tgl_terima');
                        $update['no_agenda'] = $request->get('u_sifat_surat');

                        $update['file_surat_masuk'] = $request->get('u_file_surat_masuk');

                        
                        return redirect ('/tambahSurat')->with('berhasil','Data Berhasil Disimpan');
                        }else{
                            return redirect ('/tambahSurat')->with('berhasil','Data Berhasil Disimpan');                        
                        }

                }else{
                    return redirect ('/tambahSurat')->with('gagal','Data Gagal Disimpan');
                }
         
        }else{
            return redirect ('/')->with('gagal','Anda Sudah logout, silahkan login kembali');

        }
    }

    public function kirimSurat($id){
        $token = Session::get('token');
        $tokenDb = M_Admin::where('token',$token)->count();

        if($tokenDb > 0){
            if(M_Surat_masuk::where('id_surat_masuk',$id)->update(
                [
                    "status" =>"2"
                ]
            )){
                return redirect ('/tambahSurat')->with('berhasil','Status Pengajuan berhasil diubah');
            }else{
                return redirect ('/tambahSurat')->with('gagal','Status Pengajuan Gagal diubah');
            }
        }else{
            return redirect('/')->with('gagal', 'Anda Silahkan Login Dahulu');
        }
    }
    
}
