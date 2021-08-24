<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Admin extends Model
{
    //
    protected $table = 'tbl_admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = ['id_admin','nama','nip','password','status','token'];
}
