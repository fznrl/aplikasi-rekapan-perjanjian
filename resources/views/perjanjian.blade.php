@extends('layouts.main')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.2/datatables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rekapan Perjanjian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
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
              <h3 class="card-title">{{$title}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="float-none">
                <a href="{{ route('tambah') }}" class="btn btn-primary mb-3">Tambah Data <i class="fa-solid fa-plus"></i></a>
                <a href="#" class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-file-import"></i> Import</a>
                <a href="{{ route('perjanjian.export') }}" class="btn btn-info mb-3"><i class="fa-solid fa-file-export"></i> Export File</a>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="modal-title fs-5" id="exampleModalLabel">Import File Perjanjian</p>
                        <button type="button" class="btn-close fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('perjanjian.import') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="file" name="file" class="form-control mt-2 mb-2">
                          <button class="btn btn-success">Import</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <table id="myTable" class="table table-bordered table-hover">
                <thead>
                <tr class="text-center">
                    <th style="width: 5px">No.</th>
                    <th>Uraian</th>
                    <th>NO. PKS</th>
                    <th>Mulai</th>
                    <th>Berakhir</th>
                    <th>Sisa Waktu</th>
                    <th>Wilayah</th>
                    <th>Kegiatan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($perjanjians as $perjanjian)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $perjanjian->uraian }}</td>
                        <td>{{ $perjanjian->no_pks }}</td>
                        <td>{{ $perjanjian->mulai }}</td>
                        <td>{{ $perjanjian->berakhir }}</td>
                        <td>{{ $perjanjian->sisa_waktu.' hari'}}</td>
                        <td>{{ $perjanjian->wilayah }}</td>
                        <td>{{ $perjanjian->kegiatan }}</td>
                        <td>{{ $perjanjian->keterangan }}</td>
                        <td nowrap="nowrap">
                          <center>
                            <div class="row" style="width: max-content">
                              <div class="col p-1">
                                <a href="{{ route('edit', ['perjanjian'=>$perjanjian->id]) }}" method="GET" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                              </div>
                              <div class="col p-1">
                                <form action="{{ route('hapus', ['perjanjian'=>$perjanjian->id])}}" method="GET">
                                  @csrf
                                  <button class="btn btn-danger" onclick="return confirm('yaking mau hapus data?')"><i class="fa-solid fa-trash"></i> </button>
                                </form>
                              </div>
                            </div>
                          </center>
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
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script>
 $('#myTable').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
//  
</script>
@endpush
