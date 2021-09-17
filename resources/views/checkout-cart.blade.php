@extends('layout.main')

@section('konten')
    <!-- Banner -->
    <div class="banner">
        <div class="container txt-banner">
          <h1 class="text-center shadow text-uppercase">Checkout</h1>
        </div>
    </div>

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

    @include('components.form-checkout')
   
    
@endsection