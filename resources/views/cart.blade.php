@extends('layout.main')

@section('konten')

   <!-- Banner -->
   <div class="banner">
    <div class="container txt-banner">
      <h1 class="text-center shadow text-uppercase">Cart</h1>
    </div>
  </div>

  @if ($cartId == '')
    <div class="container my-4 text-center">
        <h3>Tidak Ada Data</h3>
    </div>
  @else
  
    <div class="container-md content-whistlist">
        <table class="table">
          <thead class="table-whistlist">
            <tr>
              <th scope="col"></th>
              <th scope="col">Produk</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Qty</th>
              <th scope="col">Harga</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($carts as $item)   
              <tr>
                <th style="vertical-align: middle; width: 5%" scope="row">
                    <button type="button" class="btn-close" aria-label="Close"></button>
                </th>
                <td style="width: 25%; vertical-align: middle">
                  <img src="{{ asset('storage/foto-produk/'. $item->gambar) }}" width="100px" alt="" />
                </td>
                <td class="fw-bold text-uppercase" style="vertical-align: middle">{{ $item->nama }}</td>
                <td style="vertical-align: middle">{{ $item->qty }}</td>
                <td style="vertical-align: middle">@currency($item->harga)</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <td colspan="4" class="fw-bold">Total</td>
                  <td class="fw-bold">@currency($total)</td>
              </tr>
          </tfoot>
        </table>
    
        <form action="/checkout-carts" method="POST">
          @csrf
          <input type="hidden" name="idUser" id="idUser" value="{{ auth()->user()->id }}">
          <input type="hidden" name="username" id="username" value="{{ auth()->user()->username }}">
          <input type="hidden" name="total" id="total" value="{{ $total }}">
          <div class="text-end">
            <button type="submit" class="btn search-btn fw-bold text-uppercase">Checkout Semua</button>
          </div>
        </form>
    </div>
  
  @endif

@endsection