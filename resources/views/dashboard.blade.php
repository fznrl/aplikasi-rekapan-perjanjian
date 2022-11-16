@extends('layouts.main')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.2/datatables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
<link rel="stylesheet" href="resources/css/swiper.css">
<style>
  .swiper-slide{
    min-width: 300px;        
  }
</style>
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
      <div class="container-fluid">
      <div class="swiper mySwiper">
        <!-- Small boxes (Stat box) -->
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
               @php
                 $count = DB::table('perjanjians')->where('sisa_waktu', "<=", 30)->count();
               @endphp
               <h3>{{ $count }}</h3>
 
               <p>Perjanjian Kurang dari 1 Bulan</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-file-circle-exclamation"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <div class="swiper-slide">
           <!-- small box -->
           <div class="small-box bg-info">
             <div class="inner">
              @php
                $count = DB::table('perjanjians')->count();
              @endphp
               <h3>{{ $count }}</h3>
 
               <p>Total Perjanjian</p>
             </div>
             <div class="icon">
              <i class="fa-solid fa-database"></i>
              {{-- <i class="ion ion-bag"></i> --}}
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         @php
            $category = new App\Models\Category;
            $categoryList = $category::all();
            $bg = ['bg-primary', 'bg-success', 'bg-warning', 'bg-danger', 'bg-info', 'bg-secondary'];
         @endphp

         @foreach ($categoryList as $item)    
          <div class="swiper-slide">
            <!-- small box -->
            <div class="small-box {{ $bg[$item->id%count($bg)] }}">  
              <div class="inner">
                @php
                  $count = DB::table('perjanjians')->where('category_id', $item->id)->count();
                @endphp
              <h3>{{ $count }}</h3>

              <p>{{ $item->name }}</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-file-lines"></i>
                
              </div>
              <a href="{{ route('perjanjian', ['slug'=>$item->slug, 'id'=>$item->id]) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         @endforeach
       </div>
       <!-- /.row -->
       <!-- Main row -->
       <div class="swiper-button-next"></div>
       <div class="swiper-button-prev"></div>
       <div class="swiper-pagination"></div>
      </div>
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
      {{-- <div class="">
        <div class=""> --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Rekapan Perjanjian</h3>
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
              <table id="myTable" class="table table-bordered table-riped" role="grid" style="width: 100%">
                <thead>
                <tr class="text-center">
                    <th style="width: 5px">No.</th>
                    <th>Kategori</th>
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
                        <td>{{ $perjanjian->category->name }}</td>
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
        {{-- </div>
        <!-- /.col -->
      </div> --}}
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