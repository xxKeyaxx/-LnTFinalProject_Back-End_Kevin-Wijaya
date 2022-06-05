@extends('layouts/app')
@section('title', 'Kelola Kategori | MusangDataApp')

@section('content')
@include('kategori.create')
<div class="d-flex justify-content-center mt-5">
    <div class="col-md-4">
        <h2 class="fs-3 mb-3"><i class="uil uil-books me-1"></i>Kelola Kategori</h2>
        <button type="button" class="btn btn-primary btn-sm mb-3 text-white" data-bs-toggle="modal" data-bs-target="#tambahKategori">
            <i class="uil uil-plus me-1"></i>Tambah Kategori
        </button>

        @if(session('status'))
            <div class="alert alert-success"><i class="uil uil-check me-1"></i>{{session('status')}}</div>
        @endif

        @if($kategori->count() == null)
            <div class="alert alert-warning" role="alert">
                Tidak ada kategori
            </div>
        @else
            <table class="table">
                <thead align="center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach($kategori as $data)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kategori }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $data->id) }}" class="text-primary">
                                <i class="uil uil-edit"></i>
                            </a>
                            <a href="#" data-uri="{{ route('kategori.destroy', $data->id) }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" class="text-danger">
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