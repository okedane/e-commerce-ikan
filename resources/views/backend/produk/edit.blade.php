@extends('layouts.app')

@section('title', 'Edit Produk')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Forms Edit </h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a>
                    </div>
                    <div class="breadcrumb-item active">
                        <a>Edit</a>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('produk.action_edit', $produk->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <input type="hidden" name="_method" value="PUT">  --}}
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label>Produk</label>
                                <input type="name"
                                    class="form-control @error('nama_produk')
                                is-invalid
                            @enderror"
                                    name="nama_produk" value="{{ $produk->nama_produk }}">
                                @error('nama_produk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    name="gambar">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text"
                                    class="form-control @error('deskripsi')
                                is-invalid
                            @enderror"
                                    name="deskripsi" value="{{ $produk->deskripsi }}">
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number"
                                    class="form-control @error('harga')
                                is-invalid
                            @enderror"
                                    name="harga" value="{{ $produk->harga }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number"
                                    class="form-control @error('stock')
                                is-invalid
                            @enderror"
                                    name="stock" value="{{ $produk->stock }}">
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
