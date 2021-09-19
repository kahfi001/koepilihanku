@extends('layout.main')

@section('konten')

<!-- Banner -->
<div class="banner">
    <div class="container txt-banner">
      <h1 class="text-center shadow text-uppercase">Produk</h1>
    </div>
</div>

  {{-- <!-- Fliter -->
  <div class="container-md filter">
    <div class="row text-center filter-row text-uppercase">
      <div class="offset-md-3 col-md-2 d-block align-self-center">
        <p class="badge text-wrap txt" style="font-size: 16px; padding: 15px">Biji Kopi</p>
      </div>
      <div class="col-md-2 d-block align-self-center">
        <p>Bubuk Kopi</p>
      </div>
      <div class="col-md-2 d-block align-self-center">
        <p>Mesin Kopi</p>
      </div>
    </div>
  </div> --}}

  <!-- Produk -->

  @if ($products->count())
  <div class="container-md produk content-produk">
    <h2 class="text-center fw-bold"  style="margin-bottom: 40px">Produk Kami</h2>

    @include('components.product-item')

    <div class="d-flex justify-content-center">
      {{ $products->links() }}
    </div>


  </div>
  @else
  <div class="container my-4 text-center">
      <h3>Tidak Ada Data</h3>
  </div>
  @endif

    
@endsection