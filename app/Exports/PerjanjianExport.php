<?php

namespace App\Exports;

use App\Models\Perjanjian;
use Maatwebsite\Excel\Concerns\FromCollection;

class PerjanjianExport implements FromCollection
{/**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Perjanjian::select("category_id", "uraian", "no_pks", "mulai", "berakhir", "wilayah", "kegiatan", "keterangan")->get();
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID Kategori", "URAIAN", "NO PKS", "MULAI", "BERAKHIR", "WILAYAH", "KEGIATAN", "KETERANGAN"];
    }
}
