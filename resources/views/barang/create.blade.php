<div class="modal fade" id="createBarangModal" tabindex="-1" aria-labelledby="createBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBarangModalLabel">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('storeBarang') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Foto Barang</label>
                        <input type="file" class="form-control" name="foto_barang">
                    </div>

                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"" placeholder="Masukkan nama barang" name="nama_barang" value="{{ old('nama_barang') }}">
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
                            <input type="number" class="form-control @error('harga_barang') is-invalid @enderror"" placeholder="Masukkan harga barang" name="harga_barang" value="{{ old('harga_barang') }}">
                            @error('harga_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror"" placeholder="Masukkan stok barang" name="stok" value="{{ old('stok') }}">
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

                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('addedScript')
    <script></script>
@endsection