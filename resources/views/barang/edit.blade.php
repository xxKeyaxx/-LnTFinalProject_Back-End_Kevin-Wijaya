@extends('layouts/app')
@section('title', $barang->nama_barang.' - Edit Barang | MusangDataApp')

@section('content')
<div class="form-wrapper col-md-4">
    <h2>Edit Barang</h2>
    <form action="{{ route('updateBarang', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="">Foto Barang</label>
            <img src="{{ asset('storage/app/public/images/barang/'.$barang->foto_barang) }}" alt="{{ $barang->nama_barang }}" class="w-100 mb-2">
            <input type="file" class="form-control" name="foto_barang">
        </div>
        <div class="form-group">
            <label for="">Nama Barang</label>
            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"" placeholder="Masukkan nama barang" name="nama_barang" value="{{ $barang->nama_barang }}">
            @error('nama_barang')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Harga Barang</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control @error('harga_barang') is-invalid @enderror"" placeholder="Masukkan harga barang" name="harga_barang" value="{{ $barang->harga_barang }}">
                @error('harga_barang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="">Stok</label>
            <input type="number" class="form-control @error('stok') is-invalid @enderror"" placeholder="Masukkan stok barang" name="stok" value="{{ $barang->jumlah_barang }}">
            @error('stok')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Kategori</label>
            <select name="kategori" class="form-control">
                @foreach($kategori as $category)
                <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                @endforeach
            </select>
            @error('kategori')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary btn-sm text-white">Submit</button>
    </form>
</div>
@endsection