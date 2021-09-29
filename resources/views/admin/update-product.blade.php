@extends('layout.layout-admin')

@section('konten')


<div class="container">
    <form method="POST" action="/product-update" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="id" id="id" value="{{ $produk->id }}" placeholder="Masukkan nama produk" required>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nama</label>
            <input type="text" class="form-control" name="namaProduk" id="nama" value="{{ $produk->nama }}" placeholder="Masukkan nama produk" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Penjelasan Singkat</label>
            <input type="text" class="form-control" name="penjelasan" id="penjelasan" value="{{ $produk->penjelasan_singkat }}" placeholder="Masukkan Penjelasan Singkat" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga" value="{{ $produk->harga }}" placeholder="Masukkan Harga" required>
        </div>
        <div class="mb-3">
            <label for="message-text" class="col-form-label">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $produk->deskripsi }}</textarea>
        </div>
        <div class="input-group mb-4">
            <label class="input-group-text" for="inputGroupFile01">Upload</label>
            <input type="file" class="form-control" name="gambar" required>
        </div>
        <button type="submit" class="btn btn-success" name="upload">Submit</button>
    </form>
</div>
    
@endsection