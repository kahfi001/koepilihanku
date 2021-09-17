@extends('layout.main')

@section('konten')

   <!-- Banner -->
   <div class="banner">
    <div class="container txt-banner">
      <h1 class="text-center shadow text-uppercase">whistlist</h1>
    </div>
  </div>

<div class="container-md content-whistlist">
    <table class="table">
      <thead class="table-whistlist">
        <tr>
          <th scope="col"></th>
          <th scope="col">Produk</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Harga</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($whistlist as $item)   
          <tr>
            <th style="vertical-align: middle; width: 5%" scope="row">
              <button type="button" class="btn-close" aria-label="Close"></button>
            </th>
            <td style="width: 25%; vertical-align: middle">
              <img src="{{ asset('storage/foto-produk/'. $item->gambar) }}" width="100px" alt="" />
            </td>
            <td class="fw-bold text-uppercase" style="vertical-align: middle">{{ $item->nama }}</td>
            <td style="vertical-align: middle">@currency($item->harga)</td>
            <td style="vertical-align: middle">
              <button type="submit" class="btn btn-beli text-uppercase">Checkout</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>

@endsection