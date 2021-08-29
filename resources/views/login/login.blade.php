@extends('layout.main')

@section('konten')

<div class="container" style="margin-top: 150px">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-signin">
                <form>
                    <div class="text-center">
                        <img class="mb-4" src="/asssets/img/logo-hitam.png" alt="" width="72" height="57">
                    </div>
                  <h1 class="h3 mb-3 fw-normal text-center">Silahkan Login</h1>
              
                  <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Alamat Email</label>
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                  </div>
                  <button class="w-100 btn btn-lg search-btn my-3" type="submit">Login</button>
                </form>
                <small class="d-block text-center">Belum Punya Akun? <a href="/register">Daftar Sekarang</a> </small>
            </main>
        </div>
    </div>
</div>


  
@endsection