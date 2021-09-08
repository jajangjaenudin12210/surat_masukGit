<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class M_Surat_masuk extends Model
{
    //
    protected $table = 'tbl_surat_masuk';
    protected $primaryKey = 'id_surat_masuk';
    protected $fillable = [
        'id_surat_masuk',
        'asal_surat_masuk',
        'no_surat_masuk',
        'perihal_surat_masuk',
        'file_surat_masuk',
        'tgl_surat_masuk',
        'tgl_terima',
        'no_agenda',
        'sifat_surat',
        'status'
    ];

    public function mydisposisi()
    {
        // return $this->hasMany(M_Disposisi::class,'tbl_disposisi.id_surat_masuk','tbl_surat_masuk.id_surat_masuk');
        return $this->hasMany(M_Disposisi::class,'id_disposisi');
    }
}
