<?php

namespace App\Exports;

use App\Models\SuratK;
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

class history_keluar_Export implements FromQuery,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function query()
    {
        return SuratK::query()->where('status','!=',0);
    }
    public function headings(): array
    {
        return [
            'Id',
            'Tps Jogja',
            'Nik',
            'No_kk', 
            'Nama',
            'Prov Tujuan',
            'Kab Tujuan',
            'Kec Tujuan', 
            'Kel Tujuan',
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
    public function map($SuratK): array
    {
        return [
            $SuratK->id,
            Tps::where('id',$SuratK->tps_jog)->value('nama'),
            $SuratK->nik,
            $SuratK->no_kk,
            $SuratK->nama,
            Prov::where('id',$SuratK->prov)->value('nama'),
            KabKot::where('id',$SuratK->kab)->value('nama'),
            Kecamatan::where('id',$SuratK->kec)->value('nama'),
            Keldes::where('id',$SuratK->kel)->value('nama'),
            Kecamatan::where('id',$SuratK->kec_jog)->value('nama'),
            Keldes::where('id',$SuratK->kel_jog)->value('nama'),
            $SuratK->alamat,
            $SuratK->dis,
            $SuratK->alasan,
            $SuratK->email,
            $SuratK->No_hp,
            $SuratK->status,
           
        ];
    }
}
