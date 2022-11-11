@extends('layouts.main')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.2/datatables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
<link rel="stylesheet" href="resources/css/swiper.css">
@endpush

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
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="swiper mySwiper container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="swiper-wrapper">
         <div class="swiper-slide">
           <!-- small box -->
           <div class="small-box bg-info">
             <div class="inner">
               <h3>150</h3>
 
               <p>New Orders</p>
             </div>
             <div class="icon">
               <i class="ion ion-bag"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="swiper-slide">
           <!-- small box -->
           <div class="small-box bg-success">
             <div class="inner">
               <h3>53<sup style="font-size: 20px">%</sup></h3>
 
               <p>Bounce Rate</p>
             </div>
             <div class="icon">
               <i class="ion ion-stats-bars"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="swiper-slide">
           <!-- small box -->
           <div class="small-box bg-warning">
             <div class="inner">
               <h3>44</h3>
 
               <p>User Registrations</p>
             </div>
             <div class="icon">
               <i class="ion ion-person-add"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="swiper-slide">
           <!-- small box -->
           <div class="small-box bg-danger">
             <div class="inner">
               <h3>65</h3>
 
               <p>Unique Visitors</p>
             </div>
             <div class="icon">
               <i class="ion ion-pie-graph"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <div class="swiper-slide">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="swiper-slide">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="swiper-slide">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!-- ./col -->
       </div>
       <!-- /.row -->
       <!-- Main row -->
       <div class="swiper-button-next"></div>
       <div class="swiper-button-prev"></div>
       <div class="swiper-pagination"></div>
      </div>
    </section>
    <section class="content">
    <div class="container-fluid">
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="">
        <div class="">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Rekapan Perjanjian</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('perjanjian.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-primary">Import User Data</button>
            </form>
              <a href="{{ route('tambah') }}" class="btn btn-primary mb-3">Tambah Data +</a>
              <table id="myTable" class="table table-bordered table-riped" role="grid" style="width: 100%">
                <a class="btn btn-danger float-end" href="{{ route('perjanjian.export') }}">Export User Data</a>
                <thead>
                <tr>
                    <th style="width: 5px">No.</th>
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
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $perjanjian->category->name }}</td>
                        <td>{{ $perjanjian->uraian }}</td>
                        <td>{{ $perjanjian->no_pks }}</td>
                        <td>{{ $perjanjian->mulai }}</td>
                        <td>{{ $perjanjian->berakhir }}</td>
                        <td>{{ $perjanjian->wilayah }}</td>
                        <td>{{ $perjanjian->kegiatan }}</td>
                        <td>{{ $perjanjian->keterangan }}</td>
                        <td nowrap="nowrap">
                          <center>
                            <div class="row" style="width: max-content">
                              <div class="col p-1">
                                <a href="{{ route('edit', ['perjanjian'=>$perjanjian->id]) }}" method="GET" class="badge bg-warning border-0" >Ubah</a>
                              </div>
                              <div class="col p-1">
                                <form action="{{ route('hapus', ['perjanjian'=>$perjanjian->id])}}" method="GET">
                                  @csrf
                                  <button class="badge bg-danger border-0" onclick="return confirm('yaking mau hapus data?')" >Hapus</button>
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
// $(document).ready( function () {
//     $('#myTable').DataTable();
// } );
</script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    freeMode: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
@endpush