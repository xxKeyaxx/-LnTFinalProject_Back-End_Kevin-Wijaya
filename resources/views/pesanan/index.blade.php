@extends('layouts/app')
@section('title', 'Kelola Pesanan | MusangDataApp')

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success"><i class="uil uil-check me-1"></i>{{session('status')}}</div>
        @endif
        @if(Auth::user()->role == 'Admin')
            <h2 class="fs-3 mb-3"><i class="uil uil-history me-1"></i>Kelola Pesanan</h2>
            @if($pesananPending->count() == NULL)
                <div class="alert alert-warning" role="alert">
                    Tidak Ada Pesanan
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Alamat Pengiriman</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesananPending as $data)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>
                                {{ $data->barang->nama_barang }}
                                <br>
                                <span class="badge bg-light text-dark">{{ $data->barang->kategori->nama_kategori }}</span>
                            </td>
                            <td>
                                {{ $data->alamat }}
                                <br> 
                                <span class="badge bg-info">Kode Pos {{ $data->kode_pos }}</span>
                            </td>
                            <td>
                                <b>INV</b>{{ $data->nomor_invoice }}
                                <br>
                                <span class="badge bg-danger text-white">{{ $data->status }}</span>
                            </td>
                            <td>{{ $data->jumlah_pesanan }}</td>
                            <td>Rp. {{ number_format($data->barang->harga_barang) }}</td>
                            <td><b>Rp. {{ number_format($data->total_harga) }}</b></td>
                            <td>
                                <a href="#" href="#" data-uri="{{ route('terimaPesanan', $data->id) }}" data-bs-toggle="modal" data-bs-target="#konfirmasiTerimaPesananModal" class="btn btn-success btn-sm fs-6 fw-bold text-white">
                                    <i class="uil uil-check me-1"></i>Terima
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @elseif(Auth::user()->role == 'Member')
            <h1 class="fs-3 mb-3"><i class="uil uil-history me-1"></i>Riwayat Pesanan</h1>
            @if($pesanan->count() == NULL)
                <div class="alert alert-warning" role="alert">
                    Tidak Ada Pesanan
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Alamat Pengiriman</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanan as $data)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>
                                {{ $data->barang->nama_barang }}
                                <br>
                                <span class="badge bg-light text-dark">{{ $data->barang->kategori->nama_kategori }}</span>
                            </td>
                            <td>
                                {{ $data->alamat }}
                                <br> 
                                <span class="badge bg-info">Kode Pos {{ $data->kode_pos }}</span>
                            </td>
                            <td>
                                <b>INV</b>{{ $data->nomor_invoice }}
                                <br>
                                @if($data->status == 'Accepted')
                                <span class="badge bg-success">{{ $data->status }}</span>
                                @elseif($data->status == 'Pending')
                                <span class="badge bg-warning text-dark">{{ $data->status }}</span>
                                @endif
                            </td>
                            <td>{{ $data->jumlah_pesanan }}</td>
                            <td>Rp. {{ number_format($data->barang->harga_barang) }}</td>
                            <td><b>Rp. {{ number_format($data->total_harga) }}</b></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endif
    </div>
</div>
@endsection