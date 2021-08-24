<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use \Firebase\JWT\JWT;

use Illuminate\Response;

use Illuminate\Support\Facades\Validator;

use Illuminate\Contacts\Encryption\DecryptException;

//import model admin
use App\M_Admin;

class Login extends Controller
{
    //
    public function index(){
        return view('admin.Login');        
    }

    // public function adminGenerate(){
    //     M_Admin::create([
    //         'nama'=>"admin",
    //         'nip' => "12345",
    //         'password' => encrypt("12345")
    //     ]);
    // }


    public function loginAdmin (Request $request){
        $this->validate($request,
            [
                'nip' => 'required',
                'password' => 'required'
            ]
        ); 

        $cek = M_Admin::where ('nip',$request->nip)->count();
        $adm = M_Admin::where ('nip',$request->nip)->get();

        if($cek > 0){
            foreach($adm as $ad){
                if(decrypt($ad->password)==$request->password){
                    $key = env('APP_KEY');
                    $data = array(
                        "id_admin" => $ad->id_admin
                    );

                    $jwt = JWT::encode($data,$key);

                    M_Admin::where('id_admin', $ad->id_admin)->update(
                        [
                            'token' => $jwt
                        ]);

                    Session::put('token',$jwt);
                    return view('utama.home');

                }else{
                    return redirect('/')->with('gagal','Password Anda Salah');        
                }
            }
        }else{
            return redirect('/')->with('gagal','NIP anda tidak terdaftar');
        }

    }

    public function keluarAdmin(){
        $token = Session::get('token');
        if(M_Admin::where('token',$token)->update(
            [
                'token' => 'keluar',
            ]

        )){
            Session::put('token',"");
            return redirect('/')->with('gagal','Anda Sudah logout, silahkan login kembali');
        }else{
            return redirect ('/')->with('gagal','Anda gagal logout');
        }
    }
    
}
