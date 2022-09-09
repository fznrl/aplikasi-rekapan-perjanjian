@extends('layouts.main')


@section('content')


    
    <table>
        <tr>
            <th>Uraian</th>
            <th>NO. PKS</th>
            <th>Mulai</th>
            <th>Berakhir</th>
            <th>Wilayah</th>
            <th>Kegiatan</th>
            <th>Keterangan</th>
        </tr>
        @foreach ($perjanjians as $perjanjian)
        <tr>
            <td>{{ $perjanjian->uraian }}</td>
            <td>{{ $perjanjian->no_pks }}</td>
            <td>{{ $perjanjian->mulai }}</td>
            <td>{{ $perjanjian->berakhir }}</td>
            <td>{{ $perjanjian->wilayah }}</td>
            <td>{{ $perjanjian->kegiatan }}</td>
            <td>{{ $perjanjian->keterangan }}</td>
        </tr> 
        @endforeach
        
    </table>
@endsection