{{-- INI HALAMAN KALAU UDAH LOGIN --}}
@extends('layouts/app')
@section('title', 'Aplikasi Pendataan Barang | MusangDataApp')

@section('content')
    <!-- Banner -->
    <br>
    <div class='container banner'>
        <h1><center>WHAT IS MUSANG DATA COLLECTION?</h1>
        <p><center>
            We are a platform that allows you to manage and collect data for your transactions and storage. We provide you with a platform that is easy to use and easy to manage in order to maximize productivity and efficiency of PT. Musang's workforce.
        </p>
        <!-- <!-- <a href="{{ url('books/manage') }}" class="btn btn-warning">Manage Books</a> -->
        <a class="btn btn-light" href="{{ url('/learn') }}" role="button">Learn More</a>
    </div>
    
    <div class="container mt-3">
        <h2><i class="uil uil-box me-1"></i>Daftar Barang</h2>
        <hr>
        @if($barang->count() == NULL)
            <div class="alert alert-warning" role="alert">
                Tidak Ada Barang Terdaftar
            </div>
        @else
            <div class="row">
                @foreach($barang as $data)
                <div class="col-xl-3 col-6 mb-3">
                    <div class="col-md-12 shadow-sm">
                        <img src="{{ asset('storage/images/barang/'.$data->foto_barang) }}" alt="{{ $data->nama_barang }}" class="w-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->nama_barang }}</h5>
                            <p class="card-text">Rp. {{ number_format($data->harga_barang) }}</p>
                            <p class="card-text">
                                Stok: 
                                @if($data->jumlah_barang === '0' || $data->jumlah_barang == null)
                                    <span class="text-alert">Stok Barang Sudah Habis</span>
                                @else
                                    {{ $data->jumlah_barang }}
                                @endif
                            </p>
                            <a href="{{ route('showBarang', $data->id) }}" class="btn btn-success text-white w-100">Show<i class="uil uil-eye ms-1"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
