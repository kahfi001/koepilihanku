<!-- Modal -->
<div class="modal fade" id="singleQtyModal" tabindex="-1" aria-labelledby="singleQtyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="singleQtyModalLabel">Masukkan Banyaknya Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form method="POST" action="/checkout" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Qty</label>
                  <div class="box nice-number">
                    <input type="number" class="form-control" name="qty" id="qty" placeholder="Masukkan Qty">
                  </div>
              </div>
              <input type="hidden" name="idUser" value="{{ auth()->user()->id }}">
              <input type="hidden" name="username" value="{{ auth()->user()->username }}">
              <input type="hidden" name="id" value="{{ $produk->id }}">
              <input type="hidden" name="nama" value="{{ $produk->nama }}">
              <input type="hidden" name="harga" value="{{ $produk->harga }}">
              <button type="submit" class="btn btn-success" name="upload">Submit</button>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>