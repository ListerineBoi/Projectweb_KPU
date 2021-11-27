<?php

namespace App\Imports;

use App\Models\Tps;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class TpsImport implements ToModel, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tps([
            'lokasi'=> $row[0],
            'nama'=> $row[1],
            'alamat'=> $row[2],
            'jml_p_tetap'=> $row[3],
            'presentase'=> $row[4],
            'koordinat' => $row[5],
        ]);
    }
}
