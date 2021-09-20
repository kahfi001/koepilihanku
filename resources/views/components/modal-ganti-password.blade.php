<!-- Modal -->
<div class="modal fade" id="inputModalPassword" tabindex="-1" aria-labelledby="inputModalPasswordLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="inputModalPasswordLabel">Ganti Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form method="POST" action="/checkout" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
              </div>
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