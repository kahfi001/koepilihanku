@extends('layout.main')

@section('konten')
    <!-- Banner -->
    <div class="banner">
        <div class="container txt-banner">
          <h1 class="text-center shadow text-uppercase">Daftar Transaksi</h1>
        </div>
    </div>

    <div class="container py-3">
        @if ($payment->count())
            @foreach ($payment as $item)
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <h3 class="fw-bold">
                            No. Transaksi : {{ $item->no_payment }}
                        </h3>
                        <hr>
                        <h6 class="fw-bold">Atas nama : {{ $item->nama }}</h6>
                        <p>{{ $item->payment_date }}</p>
                        <h6 class="fw-bold">Total Harga : @currency($item->total)</h6>
                        <div class="badge bg-success text-wrap" style="width: 12rem;">
                            <h6>{{ $item->status }}</h6>
                        </div>

                        @if ($item->status == "Sedang dikirim")
                            <div class="d-flex justify-content-end">
                                <form action="/daftar-transaksi" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{ $item->id }}">
                                    <button onclick="return confirm('Apakah anda yakin sudah menerima barang?')"class="btn search-btn">Konfirmasi Paket sudah diterima</button>
                                </form>
                            </div>
                        @else
                            <div class="d-flex justify-content-end d-none">
                                <button onclick="return confirm('Apakah anda yakin sudah menerima barang?')" class="btn btn-search">Konfirmasi Paket sudah diterima</button>
                            </div>
                        @endif

                        
                    </div>
                </div>
            @endforeach
        @else
        <div class="container my-4 text-center">
            <h3>Tidak Ada Data</h3>
        </div>
        @endif
    </div>
    
@endsection