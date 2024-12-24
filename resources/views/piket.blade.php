@extends('layouts.main')
@section('content')
  <div class="content">
    <section id="siswa" class="py-5">
      <div class="container">
        <div class="row justify-content-center">
          <h4 class="text-center fw-bold mb-0">Data Piket {{ $nama_kelas }}</h4>
          <p class="text-center text-secondary">Untuk Bulan Ini</p>
          <div class="col">
            <div class="card border-0 shadow-sm">
              <div class="card-body">
                <div class="row justify-content-center mb-4 mt-2">
                  <div class="col-md-5">
                    <form action="" method="GET">
                      <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="Cari dengan nama..." value="{{ @request('search') }}">
                        <button type="submit" class="btn btn-light border-1"><i class="fa fa-search"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="table-responsive">

                  <table class="table">
                    <thead>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Nama</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                    </thead>
                    <tbody>
                      @if ($data->isEmpty())
                        <tr>
                          <td colspan="6" class="text-center text-secondary">--- Empty data ---</td>
                        </tr>
                      @endif
                      @foreach ($data as $item)
                        @php
                          if ($item->status === 'Piket') {
                              $color = 'success';
                          } elseif ($item->status === 'Tidak Piket') {
                              $color = 'danger';
                          } else {
                              $color = 'secondary';
                          }
                        @endphp
                        <tr>
                          <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                          <td>{{ date('d M Y', strtotime($item->tanggal)) }}</td>
                          <td>{{ $item->siswa->name }}</td>
                          <td>
                            <div class="badge bg-{{ $color }}">{{ $item->status }}</div>
                          </td>
                          <td><small>{{ substr($item->keterangan, 0, 20) }}</small></td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
                <div class="float-end">
                  {{ $data->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
