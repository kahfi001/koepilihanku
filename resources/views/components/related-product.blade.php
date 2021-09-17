<div class="row">
    @foreach ($related as $produk)
        <div class="col-md-3 col-produk">
            <a href="/product/{{ $produk->nama }}">
                <div class="produk-item mx-auto">
                    <img class="mx-auto d-block" width="200px" height="200px" style="display: block;" src="{{ asset('storage/foto-produk/'. $produk->gambar) }}" alt="" />
                    <div class="text">
                        <h5 class="text-center text-uppercase fw-bold">{{ $produk->nama }}</h5>
                        <h6 class="text-center">@currency($produk->harga)</h6>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
