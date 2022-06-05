@extends('layouts/app')
@section('title', 'Manage Barang | MusangDataApp')

@section('content')
    @include('barang.create')
    <div class="d-flex justify-content-center mt-5">
        <div class="col-md-6">
            <h2 class="fs-3 mb-3"><i class="uil uil-cube me-1"></i>Kelola Barang</h2>
            <button type="button" class="btn btn-primary btn-sm mb-3 text-white" data-bs-toggle="modal" data-bs-target="#tambahBarang">
                <i class="uil uil-plus me-1"></i>Tambah Barang
            </button>
            @if(session('status'))
                <div class="alert alert-success"><i class="uil uil-check me-1"></i>{{session('status')}}</div>
            @endif
            @if($barang->count() == null)
                <div class="alert alert-warning" role="alert">
                    Barang masih kosong
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 100px">Foto Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barang as $data)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td><img src="{{ asset('storage/images/barang/'.$data->foto_barang) }}" alt="{{ $data->nama_barang }}" class="w-100"></td>
                            <td>{{ $data->nama_barang }}</td>
                            <td>{{ $data->harga_barang }}</td>
                            <td>
                                @if($data->jumlah_barang === '0' || $data->jumlah_barang == null)
                                    <span class="text-danger">Habis</span>
                                @else
                                    {{ $data->jumlah_barang }}
                                @endif
                            </td>
                            <td>{{ $data->kategori->nama_kategori }}</td>
                            <td>
                                <a href="{{ route('editBarang', $data->id) }}" class="text-primary">
                                    <i class="uil uil-edit"></i>
                                </a>
                                <a href="#" data-uri="{{ route('deleteBarang', $data->id) }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" class="text-danger">
                                    <i class="uil uil-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection