<?php

namespace App\Imports;

use Carbon;
use DateTime;
use App\Models\Perjanjian;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

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
        $data = [
            'category_id'     => $row['id'],
            'uraian'          => $row['uraian'],
            'no_pks'          => $row['no_pks'], 
            'mulai'           => date("Y-m-d", strtotime($row['mulai'])),
            'berakhir'        => date("Y-m-d", strtotime($row['berakhir'])),
            'wilayah'         => $row['wilayah'],   
            'kegiatan'        => $row['kegiatan'],
            'keterangan'      => $row['keterangan']
        ];
        // $mulai = new DateTime($data['mulai']);
        // $akhir = new DateTime($data['berakhir']);
        // $sel = $akhir->diff($mulai)->days;
        // $data['sisa_waktu'] = $sel;
        
        return new Perjanjian($data);

        
    }

}
