<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    public $timestamps = FALSE;
    protected $fillable = [
        'lokasi','nama','alamat','jml_p_tetap', 'q_suara','jml_p_pilih', 	
    ];
    protected $table="tps";
}
