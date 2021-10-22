<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Tps;
use App\Models\KabKot;
use App\Models\Keldes;
use App\Models\Prov;
use Illuminate\Http\Request;

class FetchController extends Controller
{
    public function fetchkabkot(Request $request)
    {
     $value = $request->get('value');
     $data = KabKot::where('prov', $value)->get();
     $output ='';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.$row->nama.'</option>';
     }
     echo $output;
    }

    public function fetchkec(Request $request)
    {
     $value = $request->get('value');
     $data = Kecamatan::where('kabkot', $value)->get();
     $output ='';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.$row->nama.'</option>';
     }
     echo $output;
    }
    public function fetchkeldes(Request $request)
    {
     $value = $request->get('value');
     $data = Keldes::where('kecamatan', $value)->get();
     $output ='';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.$row->nama.'</option>';
     }
     echo $output;
    }
    public function fetchtps(Request $request)
    {
     $value = $request->get('value');
     $data = Tps::where('lokasi', $value)->get();
     $output ='';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.$row->nama.' '.$row->alamat.'</option>';
     }
     echo $output;
    }
}
