<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class M_Disposisi extends Model
{
    protected $table = 'tbl_disposisi';
    protected $primaryKey = 'id_disposisi';
    protected $fillable = [
        'id_disposisi',
        'id_admin',
        'id_surat_masuk',
        'instruksi',
        'tgl_instruksi',
        'penerima_instruksi',
        'status'
    ];


    public function suratMasuk()
    {
        // return $this->belongsTo('App\M_Surat_masuk','tbl_surat_masuk.id_surat_masuk','tbl_disposisi.id_surat_masuk');

        return $this->belongsTo(M_Surat_masuk::class,'id_surat_masuk');
    }

}
