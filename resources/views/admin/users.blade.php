@extends('layout.layout-admin')

@section('konten')
<button type="submit" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#inputModalUser">Tambahkan User</button>

<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th scope="col" style="display: none">ID</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                <tbody>
                    @foreach ($tampilUser as $user)
                    <tr>
                        <td style="vertical-align: middle; width: 5%; display:none" scope="row">
                          {{ $user->id }}
                        </td>
                        <td class="" style="vertical-align: middle">{{ $user->name }}</td>
                        <td class="" style="vertical-align: middle">{{ $user->username }}</td>
                        <td class="" style="vertical-align: middle">{{ $user->email }}</td>
                        <td class="text-uppercase" style="vertical-align: middle">{{ $user->level }}</td>
                        <td style="vertical-align: middle">
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary text-uppercase" style="width: 100px">Update</button>
                            <button type="submit" class="btn btn-danger text-uppercase" style="width: 100px">Hapus</button>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </thead>
          </table>
      </div>
  </div>
</div>
@endsection


