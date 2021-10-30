<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    public $timestamps = FALSE;
    protected $fillable = [
        'lokasi','nama','alamat','jml_p_tetap', 'jml_keluar','jml_masuk', 	
    ];
    protected $table="tps";
}
