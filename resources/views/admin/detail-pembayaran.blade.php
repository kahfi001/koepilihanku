@extends('layout.layout-admin')

@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Pembelian</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th scope="col">Produk</th>
                      <th scope="col">Nama Produk</th>
                      <th scope="col">QTY</th>
                      <th scope="col">Harga</th>
                  </tr>
                </thead>
                  <tbody>
                      @foreach ($detail as $det)
                      <tr>
                            <td style="vertical-align: middle; width: 5%; display:none" scope="row">
                                {{ $det->id }}
                            </td>
                            <td style="width: 25%; vertical-align: middle">
                                <img src="{{ asset('storage/foto-produk/'. $det->gambar) }}" width="100px" alt="" />
                            </td>
                            <td class="" style="vertical-align: middle">{{ $det->nama_produk }}</td>
                            <td class="" style="vertical-align: middle">{{ $det->qty }}</td>
                            <td class="" style="vertical-align: middle">@currency($det->harga)</td>
                        </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <td colspan="3" class="fw-bold">Total</td>
                        <td class="fw-bold">@currency($payment->total)</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="row mt-4">
            <div class="col-lg-7 mb-3">
                <form >
                    <input type="hidden" name="no_checkout" id="no_checkout" value="{{ $payment->no_checkout }}">
                    <h5 class="mb-3 text-dark fw-bold">No. Pembayaran : {{ $payment->no_payment }}</h5>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $payment->nama }}" placeholder="Nama Lengkap" name="nama" id="nama" aria-label="nama" aria-describedby="basic-addon1" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" readonly>{{ $payment->alamat }}</textarea>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Kota" value="{{ $payment->kota }}" name="kota" id="kota" aria-label="kota" aria-describedby="basic-addon1"readonly>
                        <span class="input-group-text"> </span>
                        <input type="number" class="form-control" placeholder="Kode Pos" value="{{ $payment->kodepos }}" name="kodepos" id="kodepos" aria-label="kodepos" aria-describedby="basic-addon1"readonly>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Provinsi" value="{{ $payment->provinsi }}" name="provinsi" id="provinsi" aria-label="provinsi" aria-describedby="basic-addon1"readonly>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="No. Telepon" value="{{ $payment->no_telpon }}" name="notelepon" id="notelepon" aria-label="notelepon" aria-describedby="basic-addon1" readonly>
                    </div>
                    <div class="input-group ">
                        <textarea class="form-control" id="catatan" name="catatan" placeholder="Catatan" readonly>{{ $payment->catatan }}</textarea>
                    </div>
                </form>
            </div>
            <div class="col-lg-5">
                <h6>Bukti Pembayaran :</h6>
                <img src="{{ asset('storage/bukti-bayar/'. $payment->gambar) }}" width="75%"  alt="" />
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <form action="/konfirmasi-bayar" method="POST">
                @csrf
                <input type="hidden" name="idUser" id="idUser" value="{{ auth()->user()->id }}">
                <input type="hidden" name="id" id="id" value="{{ $payment->id }}">
                <button type="submit" class="btn btn-success my-4">Konfirmasi Pembayaran</button>
            </form>
        </div>

    </div>
</div>
@endsection