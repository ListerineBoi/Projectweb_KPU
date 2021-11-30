<?php

namespace App\Exports;

use App\Models\SuratM;
use App\Models\Tps;
use App\Models\Prov;
use App\Models\Kecamatan;
use App\Models\Keldes;
use App\Models\KabKot;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class history_masuk_Export implements FromQuery,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function query()
    {
        return SuratM::query()->where('status','!=',0);
    }
    public function headings(): array
    {
        return [
            'Id',
            'Tps Jogja',
            'Nik',
            'No_kk', 
            'Nama',
            'Prov Asal',
            'Kab Asal',
            'Kec Asal', 
            'Kel Asal',
            'Kec jog',
            'Kel jog',
            'Alamat', 
            'Disabiltas',
            'Alasan',
            'Email',
            'No_hp',
            'Status',
        ];
    }
    public function map($SuratM): array
    {
        return [
            $SuratM->id,
            Tps::where('id',$SuratM->tps_jog)->value('nama'),
            $SuratM->nik,
            $SuratM->no_kk,
            $SuratM->nama,
            Prov::where('id',$SuratM->prov)->value('nama'),
            KabKot::where('id',$SuratM->kab)->value('nama'),
            Kecamatan::where('id',$SuratM->kec)->value('nama'),
            Keldes::where('id',$SuratM->kel)->value('nama'),
            Kecamatan::where('id',$SuratM->kec_jog)->value('nama'),
            Keldes::where('id',$SuratM->kel_jog)->value('nama'),
            $SuratM->alamat,
            $SuratM->dis,
            $SuratM->alasan,
            $SuratM->email,
            $SuratM->No_hp,
            $SuratM->status,
           
        ];
    }
}
