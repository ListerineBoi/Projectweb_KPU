<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    public $timestamps = FALSE;
    protected $fillable = [
        'nama',
    ];
    protected $table="kecamatan";
}
