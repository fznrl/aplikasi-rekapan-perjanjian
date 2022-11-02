@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Rekapan Perjanjian</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <button type="button" class="btn btn-success mb-2">Tambah +</button>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Uraian</th>
                    <th>NO. PKS</th>
                    <th>Mulai</th>
                    <th>Berakhir</th>
                    <th>Wilayah</th>
                    <th>Kegiatan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($perjanjians as $perjanjian)
                    <tr>
                        <td>{{ $perjanjian->category->name }}</td>
                        <td>{{ $perjanjian->uraian }}</td>
                        <td>{{ $perjanjian->no_pks }}</td>
                        <td>{{ $perjanjian->mulai }}</td>
                        <td>{{ $perjanjian->berakhir }}</td>
                        <td>{{ $perjanjian->wilayah }}</td>
                        <td>{{ $perjanjian->kegiatan }}</td>
                        <td>{{ $perjanjian->keterangan }}</td>
                        <td>
                          <button type="button" class="btn btn-danger mt-3 mb-3">Hapus</button> 
                          <button type="button" class="btn btn-warning mt-3 mb-3">Ubah</button>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</div>
@endsection