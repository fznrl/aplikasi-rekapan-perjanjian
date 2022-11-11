<?php

namespace App\Exports;

use App\Models\Perjanjian;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;


class PerjanjianExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $data = Perjanjian::select("uraian", "no_pks", "mulai", "berakhir", "wilayah", "kegiatan", "keterangan")->get();

        return $data;
    }

    public function headings(): array
    {
        return["Uraian", "NO. PKS", "Mulai", "Berakhir", "Wilayah", "Kegiatan", "Keterangan"];
    }
}
