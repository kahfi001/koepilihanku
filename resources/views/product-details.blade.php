@extends('layout.main')

@section('konten')


  <!-- Details -->
  <div class="details">
    <div class="container">
        <div class="row align-items-start">
            <!-- Details Picture-->
            <div class="col-md">
                <div class="picture">
                    ​<picture>
                        <img src="{{ asset('storage/foto-produk/'. $produk->gambar) }}" class="img-fluid img-thumbnail" alt="...">
                    </picture>
                </div>
            </div>

            <!-- Detail-Text -->
            <div class="col-md">
                <div class="detail-text">
                    <h1 class="text-uppercase fw-bold" id="nama" name="nama">{{ $produk->nama }}</h1>
                    <h2>@currency($produk->harga)</h2>
                    <p>{{ $produk->penjelasan_singkat }}</p>
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md d-flex my-3">
                              <button class="btn btn-add fw-bold text-uppercase" type="button" data-bs-toggle="modal" data-bs-target="#singleQtyModal">Checkout</button>   
                            </div> 
                            <div class="col-md d-flex my-3">
                              <div class="cart">
                                  <button class="btn fw-bold text-uppercase" type="submit" data-bs-toggle="modal" data-bs-target="#qtyModal">
                                    <span style="color: grey; ">
                                      <i class="fas fa-shopping-cart fa-2x"></i>
                                    </span>
                                  </button>  
                              </div>
                            </div>
                        </div>
                      </div>

                    <div class="container">
                        <div class="availability">                                
                            <div class="row align-items-start">
                                <div class="col">
                                    <h1 class="fw-bold">Ketersediaan</h1>
                                </div>
                                <div class="col">
                                    <p>Dalam Stok</p>
                                </div>
                            </div>
                            <div class="row align-items-start">
                                <div class="col">
                                    <h1 class="fw-bold">Berat</h1>
                                </div>
                                <div class="col">
                                    <p>125 gr</p>
                                </div>
                            </div>
                            <div class="row align-items-start">
                                <div class="col">
                                    <h1 class="fw-bold">Pengiriman</h1>
                                </div>
                                <div class="col">
                                    <p>1 Hari Pengiriman Sekitar Surabaya</p>                                
                                </div>
                            </div>
                        </div>  
                    </div> 
                </div>  
            </div>
        </div> 
    </div>
  </div>
    

      <!-- Description -->
      <div class="descrioption">
          <div class="container txt-description">
              <h1 class="text-center text-uppercase fw-bold pt-3">Description</h1>
              <h2 class="text-uppercase fw-bold">{{ $produk->nama }}</h3>
              <p>{{ $produk->deskripsi }}</p>
          </div>
      </div>

<!-- Related Product -->
  <div class="container produk pt-3">
    <h1 class="text-center text-uppercase fw-bold">Related Product</h1>
    @include('components.related-product')
  </div> 

  @include('components.modal')
  @include('components.modal-single-checkout')
@endsection