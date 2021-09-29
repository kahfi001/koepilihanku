@extends('layout.layout-admin')

@section('konten')

<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th scope="col">No. Pembayaran</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Kode Pos</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Dikonfirmasi oleh Admin</th>
                </tr> 
                <tbody>
                    @foreach ($payment as $pay)
                    <tr>
                        <td class="fw-bold text-uppercase" style="vertical-align: middle">{{ $pay->no_payment }}</td>
                        <td style="vertical-align: middle">{{ $pay->nama }}</td>
                        <td style="vertical-align: middle">{{ $pay->alamat }}</td>
                        <td style="vertical-align: middle">{{ $pay->kota }}</td>
                        <td style="vertical-align: middle">{{ $pay->kodepos }}</td>
                        <td style="vertical-align: middle">{{ $pay->provinsi }}</td>
                        <td style="vertical-align: middle">@currency($pay->total)</td>
                        <td style="vertical-align: middle">{{ $pay->status }}</td>
                        <td style="vertical-align: middle">{{ $pay->name }}</td>
                      </tr>
                    @endforeach
                </tbody>
              </thead>
          </table>
      </div>
      <div class="d-flex justify-content-end">
        {{ $payment->links() }}
      </div>
  </div>
</div>
@endsection



