<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratM extends Model
{
    public $timestamps = FALSE;
    protected $fillable = [
        'no_kk', 'nik','nama','prov','kab','kec', 'kel','tps','dis','alasan','kab_jog', 'kec_jog','kel_jog','rw','rt','email', 'No_hp','img','penerima','tps_jog',
    ];
    protected $table="s_masuk";
}
