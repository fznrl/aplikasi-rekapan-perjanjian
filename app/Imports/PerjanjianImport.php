<?php

namespace App\Imports;

use App\Models\Perjanjian;
use Illuminate\Support\Facades\Hash;
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
        return new Perjanjian([
            'category_id'     => $row['id'],
            'uraian'          => $row['uraian'],
            'no_pks'          => $row['no_pks'], 
            'mulai'           => date("Y-m-d", strtotime($row['mulai'])),
            'berakhir'        => date("Y-m-d", strtotime($row['berakhir'])),
            'wilayah'         => $row['wilayah'],
            'kegiatan'        => $row['kegiatan'],
            'keterangan'      => $row['keterangan']
        ]);
    }

    /**
     */
    public function __construct() {
    }
}