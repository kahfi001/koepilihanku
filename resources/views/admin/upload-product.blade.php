@extends('layout.layout-admin')

@section('konten')
<div class="container">
    <form style="margin-top: 200px;" method="POST" action="/admin" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nama</label>
            <input type="text" class="form-control" name="namaProduk" id="nama" placeholder="Masukkan nama produk">
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Kategori</label>
            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukkan kategori">
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan Harga">
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Upload</label>
            <input type="file" class="form-control" name="gambar">
          </div>
        <button type="submit" class="btn btn-primary" name="upload">Submit</button>
      </form>
</div>
@endsection