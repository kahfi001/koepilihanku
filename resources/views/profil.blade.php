@extends('layout.main')

@section('konten')

    <div class="container py-5">
      <h1 class="text-center py-4 text-uppercase">Profil</h1>
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 500px">
                <div class="card-body">
                    @foreach ($user as $item)
                        <form method="POST" action="/" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ $item->email }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="{{ $item->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" value="{{ $item->username }}">
                            </div>
                            <button type="button" class="btn btn-warning me-1" data-bs-toggle="modal" data-bs-target="#inputModalPassword" name="Ganti Password">Ganti Password</button>
                            <button type="submit" class="btn btn-success" name="upload">Simpan Perubahan</button>
                        </form>
                    @endforeach
             
                </div>
            </div>
        </div>
    </div>
@endsection

@include('components/modal-ganti-password')