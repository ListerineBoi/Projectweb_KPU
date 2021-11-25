<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratK extends Model
{
    public $timestamps = FALSE;
    protected $fillable = [
        'tps_jog','penerima','kec_jog','no_kk', 'nik','nama','prov','kab','kec', 'kel','dis','alasan', 'kel_jog','email', 'No_hp','img_ktp','img_c1','status','alamat', 'jk','surat_acc',
    ];
    protected $table="p_keluar";
}
