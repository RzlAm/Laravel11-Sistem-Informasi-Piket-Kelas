@extends('layouts.dashboard')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body pt-3">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <th>Logo Kelas</th>
                <th>Nama Kelas</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>
                      <img src="{{ config('app.url') }}/storage/{{ $item->logo }}" width="100px" alt="logo kelas">
                    </td>
                    <td>{{ $item->nama_kelas }}</td>
                    <td>
                      <a href="pengaturan/{{ encrypt($item->id) }}/edit" class="btn btn-success btn-sm"><i class="align-middle" data-feather="edit"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
