@extends('layout.layout-admin')

@section('konten')
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th scope="col">No. Pembayaran</th>
                    <th scope="col">Tanggal Pembayaran</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Total</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Action</th>
                </tr>
                <tbody>
                    @foreach ($pay as $py)
                    <tr>
                        <td style="vertical-align: middle; width: 5%; display:none" scope="row">
                          {{ $py->id }}
                        </td>
                        <td class="" style="vertical-align: middle">{{ $py->no_payment }}</td>
                        <td class="" style="vertical-align: middle">{{ $py->payment_date }}</td>
                        <td class="" style="vertical-align: middle">{{ $py->nama }}</td>
                        <td class="" style="vertical-align: middle">{{ $py->total }}</td>
                        <td class="" style="vertical-align: middle">{{ $py->catatan }}</td>
                        <td style="vertical-align: middle">
                          <div class="text-center">
                              <a href="/detail-pembayaran/{{ $py->no_payment }}" class="btn btn-primary text-uppercase" >Konfirmasi</a>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </thead>
          </table>
      </div>
      <div class="d-flex justify-content-end">
        {{ $pay->links() }}
      </div>
  </div>
</div>
@endsection


