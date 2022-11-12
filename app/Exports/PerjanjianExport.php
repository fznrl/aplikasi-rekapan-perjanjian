<?php

namespace App\Exports;

use App\Models\Perjanjian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PerjanjianExport implements FromCollection, WithHeadings
{/**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Perjanjian::select("category_id", "uraian", "no_pks", "mulai", "berakhir", "sisa_waktu", "wilayah", "kegiatan", "keterangan")->get();
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["id", "uraian", "no_pks", "mulai", "berakhir", "sisa_waktu", "wilayah", "kegiatan", "keterangan"];
    }
}
