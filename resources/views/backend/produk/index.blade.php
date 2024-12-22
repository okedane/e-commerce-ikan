@extends('layouts.app')

@section('title', 'Wisata')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $kategori->nama_kategori }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item"><a href="{{ route('kategori.index') }}">kategori</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        {{-- @include('layouts.alert') --}}
                    </div>
                </div>
                <div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="section-header-button ">
                                    <a href="{{ route('produk.create', $kategori->id) }}" class=" btn btn-primary">Tambah
                                        Produk</a>
                                </div>
                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Gambar</th>
                                            <th>deskripsi</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach ($produk as $prd)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $prd->nama_produk }}</td>
                                                <td><img src="{{ Storage::url('upload/produk/' . $prd->gambar) }}"
                                                        style="width: 100px; height: auto;"></td>
                                                <td>{{ $prd->deskripsi }}</td>
                                                <td>{{ $prd->harga }}</td>
                                                <td>{{ $prd->stock }}</td>
                                                <td>
                                                    <div class="d-flex justify-content">
                                                        <a href="{{route('produk.edit',$prd->id)}}" class="btn  btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('produk.delete', $prd->id) }}" method="POST" class="ml-2"
                                                            onsubmit="return confirm ('Apakah anda yakin ?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn  btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                {{-- <div class="float-right">
                                    {{ $desa->withQueryString()->links() }}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
