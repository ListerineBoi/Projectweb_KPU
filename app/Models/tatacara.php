<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tatacara extends Model
{
    public $timestamps = FALSE;
    protected $fillable = [
        'img1','img2',	
    ];
    protected $table="tatacara";
}
