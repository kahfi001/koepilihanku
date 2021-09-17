<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    {{-- <link href="{{ URL::asset('css/jquery.nice-number.css') }}" rel="stylesheet" /> --}}

    <title>Transaksi Berhasil</title>
  </head>
  <body style="margin-top: 65px">
    <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <i class="far fa-check-circle fa-8x mb-3"></i>
                        <h3 class="fw-bold mb-3">Transaksi Berhasil !</h3>
                        <p>Transaksi akan di proses oleh admin</p>
                        <a href="/">
                            <button type="submit" class="btn search-btn">Kembali ke Home</button>
                        </a>
                    </div>
                </div>
            </div>
    </div>


    <script src="https://kit.fontawesome.com/3a051b2f60.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    {{-- <script src="{{ URL::asset('js/jquery.nice-number.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('js/script-number.js') }}"></script> --}}
  </body>
</html>
