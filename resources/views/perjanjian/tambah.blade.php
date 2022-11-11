@extends('../layouts/main')

@push('css')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.2/datatables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css"> --}}
@endpush

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="mt-5 mb 5">
                                <h2 class="text-center mb-3">Tambah Data Perjanjian</h1>
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3 ">
                                    <i class="fa-solid fa-arrow-left"></i> Kembali</a>
                                <div class="card">
                                    <div class="card-body mb-5">
                                        <form action="{{ route('store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="category">Kategori</label>
                                                <select name="category_id" class="form-control">
                                                    @foreach ($categories as $category)
                                                    @if (old('category_id') == $category->id)
                                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="uraian" class="form-label">Uraian</label>
                                                <textarea aria-label="uraian" class="form-control @error('uraian') is-invalid @enderror" id="uraian" name="uraian">{{ old('uraian') }}</textarea>
                                                @error('uraian')
                                                    <div class="invalid-feedback">Uraian Harus diisi !!!</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="no_pks" class="form-label">NO. PKS</label>
                                                <input type="text" class="form-control @error('no_pks') is-invalid @enderror" id="no_pks" name="no_pks" value="{{ old('no_pks') }}">
                                                @error('no_pks')
                                                    <div class="invalid-feedback">NO. PKS Harus diisi !!!</div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="mulai" class="form-label">Mulai</label>
                                                        <input type="date" class="form-control @error('mulai') is-invalid @enderror" id="mulai" name="mulai" value="{{ old('mulai') }}">
                                                        @error('mulai')
                                                            <div class="invalid-feedback">Waktu Mulai Harus diisi !!!</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="berakhir" class="form-label">Berakhir</label>
                                                        <input type="date" class="form-control @error('berakhir') is-invalid @enderror" id="berakhir" name="berakhir" value="{{ old('berakhir') }}">
                                                        @error('berakhir')
                                                            <div class="invalid-feedback">Waktu Berakhir Harus diisi !!!</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="wilayah" class="form-label">Wilayah</label>
                                                <input type="text" class="form-control @error('wilayah') is-invalid @enderror" id="wilayah" name="wilayah" value="{{ old('wilayah') }}">
                                                @error('wilayah')
                                                    <div class="invalid-feedback">Wilayah Harus diisi !!!</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="kegiatan" class="form-label">Kegiatan</label>
                                                <input type="text" class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan" name="kegiatan" value="{{ old('kegiatan') }}">
                                                @error('kegiatan')
                                                    <div class="invalid-feedback">Kegiatan Harus diisi !!!</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" class="form-control @error('kegiatan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
                                                @error('keterangan')
                                                    <div class="invalid-feedback">Keterangan Harus diisi !!!</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary d-block float-right"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    
@endsection
@push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> --}}
@endpush
