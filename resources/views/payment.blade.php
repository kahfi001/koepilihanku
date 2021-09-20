@extends('layout.main')

@section('konten')
    <!-- Banner -->
    <div class="banner">
        <div class="container txt-banner">
          <h1 class="text-center shadow text-uppercase">Pembayaran</h1>
        </div>
    </div>

 {{-- Detail Pemesanan --}}

 @foreach ($payment as $pay)

 @if ($pay->no_payment == '')
    <div class="container my-4 text-center">
        <h3>Tidak Ada Data</h3>
    </div>
 @else
     

 <div class="container py-3">
    <h4>Data Pemesanan</h4>
    <div class="row">
        <div class="col-lg-7 mb-3">
            <form action="/payment" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="no_payment" id="no_payment" value="{{ $pay->no_payment }}">
                <input type="hidden" name="no_checkout" id="no_checkout" value="{{ $pay->no_checkout }}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ auth()->user()->username }}" name="username" id="username" aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $pay->nama }}" placeholder="Nama Lengkap" name="nama" id="nama" aria-label="nama" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" readonly>{{ $pay->alamat }}</textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Kota" value="{{ $pay->kota }}" name="kota" id="kota" aria-label="kota" aria-describedby="basic-addon1"readonly>
                    <span class="input-group-text"> </span>
                    <input type="number" class="form-control" placeholder="Kode Pos" value="{{ $pay->kodepos }}" name="kodepos" id="kodepos" aria-label="kodepos" aria-describedby="basic-addon1"readonly>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Provinsi" value="{{ $pay->provinsi }}" name="provinsi" id="provinsi" aria-label="provinsi" aria-describedby="basic-addon1"readonly>
                </div>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="No. Telepon" value="{{ $pay->no_telpon }}" name="notelepon" id="notelepon" aria-label="notelepon" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-1">
                    <label class="input-group-text" for="inputGroupFile01">Upload Bukti Pembayaran</label>
                    <input type="file" class="form-control" name="bukti" id="inputGroupFile01" aria-describedby="paymentHelp">
                </div>
                <div id="paymentHelp" class="form-text mb-3">Pastikan Jumlah Pembayaran sesuai dengan Tagihan</div>
                <div class="input-group ">
                    <textarea class="form-control" id="catatan" name="catatan" placeholder="Catatan"></textarea>
                </div>
                <div id="paymentHelp" class="form-text mb-3">Contoh : Dikirim dalam bentuk bubuk atau biji kopi</div>
                <button type="submit" class="btn search-btn">Konfirmasi Pembayaran</button>
              </form>
        </div>
        <div class="col-lg-5 ">
            <div class="h5">No. Pembayaran : {{ $pay->no_payment }}</div>
                <div class="box mb-3" style="border: solid 1px; border-radius: 10px; padding:20px">
                    <h6 class="fw-bold">Total Harga</h6>
                    <div class="row">
                        <div class="col-md">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-md">
                            <p>@currency($pay->total)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <p>Ongkos Kirim</p>
                        </div>
                        <div class="col-md">
                            <p>Gratis</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md">
                            <p class="fw-bold">Total</p>
                        </div>
                        <div class="col-md">
                            <p class="fw-bold">@currency($pay->total)</p>
                        </div>
                    </div>
                </div>
                <div class="box" style="border: solid 1px; border-radius: 10px; padding:20px">
                    <h6 class="fw-bold">Transfer Pembayaran</h6>
                    <div class="row">
                        <div class="col-md d-inline">
                            <i class="fas fa-money-check"></i>
                            <p>Bank BTN</p>
                        </div>
                        <div class="col-md">
                            <p>0025801560013819</p>
                            <p>(A.N Muhammad Kahfi)</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@endif

@endforeach

    
@endsection