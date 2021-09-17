@extends('layout.main')

@section('konten')
    <!-- Banner -->
    <div class="banner">
        <div class="container txt-banner">
          <h1 class="text-center shadow text-uppercase">Checkout</h1>
        </div>
    </div>

    @if ($noCheckout == '')
    <div class="container my-4 text-center">
        <h3>Tidak Ada Data</h3>
    </div>
    @else        
            {{-- Produk item --}}
            <div class="container py-3">
                <div class="h4">Produk yang di Checkout</div>
                <table class="table">
                    <thead class="table-whistlist">
                    <tr>
                        <th scope="col">Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($dataCheckout as $item)   
                        <tr>
                        <td style="width: 25%; vertical-align: middle">
                            <img src="{{ asset('storage/foto-produk/'. $item->gambar) }}" width="100px" alt="" />
                        </td>
                        <td class="fw-bold text-uppercase" style="vertical-align: middle">{{ $item->nama_produk }}</td>
                        <td style="vertical-align: middle">{{ $item->qty }}</td>
                        <td style="vertical-align: middle">@currency($item->harga)</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr class="mt-4">
            </div>

        {{-- Detail Pemesanan --}}
        <div class="container py-3">
            <h4>Data Pemesanan</h4>
            <div class="row">
                <div class="col-lg-7">
                    <form method="POST" action="/add-to-payment">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="noCheckout" id="noCheckout" value="{{ $noCheckout }}">
                        @foreach ($checkout as $item)
                            <input type="hidden" name="total" id="total" value="{{ $item->total }}">
                        @endforeach
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ auth()->user()->username }}" name="username" id="username" aria-label="Username" aria-describedby="basic-addon1" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" id="nama" aria-label="nama" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Kota" name="kota" id="kota" aria-label="kota" aria-describedby="basic-addon1">
                            <span class="input-group-text"> </span>
                            <input type="number" class="form-control" placeholder="Kode Pos" name="kodepos" id="kodepos" aria-label="kodepos" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Provinsi" name="provinsi" id="provinsi" aria-label="provinsi" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="No. Telepon" name="notelepon" id="notelepon" aria-label="notelepon" aria-describedby="basic-addon1">
                        </div>
                        <button type="submit" class="btn search-btn">Lanjutkan Pembayaran</button>
                    </form>
                </div>
                <div class="col-lg-5">
                    @foreach ($checkout as $item)
                        <div class="box" style="border: solid 1px; border-radius: 10px; padding:20px">
                            <h6 class="fw-bold">Total Harga</h6>
                            <div class="row">
                                <div class="col-md">
                                    <p>Subtotal</p>
                                </div>
                                <div class="col-md">
                                    <p>@currency($item->total)</p>
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
                                    <p class="fw-bold">@currency($item->total)</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

   
    
@endsection