<?php

namespace App\Imports;

use App\Models\Perjanjian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PerjanjianImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Perjanjian([
            'uraian' => $row['uraian'],
            'no_pks' => $row['no_pks'],
            'mulai' => $row['mulai'],
            'berakhir' => $row['berakhir'],
            'wilayah' => $row['wilayah'],
            'kegiatan' => $row['kegiatan'],
            'keterangan' => $row['keterangan']
        ]);
    }
}
