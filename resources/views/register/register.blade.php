@extends('layout.main')

@section('konten')

<div class="container" style="margin-top: 150px">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-signin">
                <form action="/register" method="POST">
                    @csrf
                    <div class="text-center">
                        <img class="mb-4" src="/asssets/img/logo-hitam.png" alt="" width="72" height="57">
                    </div>
                  <h1 class="h3 mb-3 fw-normal text-center">Silahkan Daftar</h1>
              
                  <div class="form-floating">
                    <input type="text" name="nama" class="form-control @error('nama')
                        is-invalid                        
                    @enderror" id="nama" placeholder="Nama" required value="{{ old('nama') }}">
                    <label for="nama">Nama Lengkap</label>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username')
                    is-invalid                        
                    @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('uesrname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email')
                    is-invalid                        
                    @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Alamat Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password')
                    is-invalid                        
                    @enderror"  id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <button class="w-100 btn btn-lg my-3 search-btn" type="submit">Daftar</button>
                </form>
                <small class="d-block text-center">Sudah Punya Akun? <a href="/login">Masuk</a> </small>
            </main>
        </div>
    </div>
</div>


  
@endsection