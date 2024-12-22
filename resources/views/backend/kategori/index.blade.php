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
                <h1>Kategori</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item"><a href="">Produk</a></div>
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
                                    <a href="{{ route('kategori.create') }}" class=" btn btn-primary">Tambah Kategori</a>
                                </div>
                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach ($kategori as $ktg)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$ktg->nama_kategori}}</td>
                                                <td>
                                                    <div class="d-flex justify-content">
                                                        <a href="{{ route('kategori.edit', $ktg->id) }}" class="btn  btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('kategori.delete', $ktg->id) }}" method="POST" class="ml-2"
                                                            onsubmit="return confirm ('Apakah anda yakin ?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn  btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        <a href="{{route('produk.index', $ktg->id)}}" class="btn  btn-info btn-icon">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
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
