@extends('layout.main')

@section('konten')
        <!-- view promo -->

        <div id="carouselExampleIndicators" class="carousel slide banner-promo" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active banner-img">
                <img src="/asssets/img/banner1.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item banner-img">
                <img src="/asssets/img/banner2.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item banner-img">
                <img src="/asssets/img/banner3.jpg" class="d-block w-100" alt="..." />
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      
          <!-- Fitur -->
          <div class="container-md services">
            <div class="row text-center">
              <div class="col-md">
                <div class="shipping rounded-circle ms-auto me-auto">
                  <i class="fas fa-truck fa-2x"></i>
                </div>
                <h5 class="text-uppercase fw-bold">bebas ongkir</h5>
                <p class="text-uppercase">bebas ongkir untuk pembelian diatas 100rb</p>
              </div>
              <div class="col-md">
                <div class="shipping rounded-circle ms-auto me-auto">
                  <i class="fas fa-check-square fa-2x"></i>
                </div>
                <h5 class="text-uppercase fw-bold">kualitas tebaik</h5>
                <p class="text-uppercase">dipilih dari biji kopi terbaik</p>
              </div>
              <div class="col-md">
                <div class="shipping rounded-circle ms-auto me-auto">
                  <i class="fas fa-globe fa-2x"></i>
                </div>
                <h5 class="text-uppercase fw-bold">pelayanan</h5>
                <p class="text-uppercase">24 jam pelayanan online</p>
              </div>
            </div>
          </div>
      
          <!-- Kategori -->
          <div class="container-md kategori">
            <h2 class="text-center fw-bold" style="margin-bottom: 40px">Kategori</h2>
            <div class="row">
              <div class="col-md-6 kategori-list">
                <div class="item k1 d-flex align-items-end ms-auto me-auto shadow">
                  <div class="badge text-wrap txt" style="width: 6rem">Biji kopi</div>
                </div>
              </div>
              <div class="col-md-6 kategori-list">
                <div class="item k2 d-flex align-items-end ms-auto me-auto shadow">
                  <div class="badge text-wrap txt" style="width: 6rem">Bubuk kopi</div>
                </div>
              </div>
              {{-- <div class="col-md kategori-list">
                <div class="item k3 d-flex align-items-end ms-auto me-auto shadow">
                  <div class="badge text-wrap txt" style="width: 6rem">Mesin kopi</div>
                </div>
              </div> --}}
            </div>
          </div>

              <!-- Produk -->
    <div class="container-md produk">
        <h2 class="text-center fw-bold">Produk Kami</h2>
        <p class="text-center" style="margin-bottom: 40px">Produk terlaris bulan ini</p>
        @include('components.related-product')
      </div>
  
@endsection