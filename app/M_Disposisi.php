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
}
