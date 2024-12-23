@extends('layouts.main')
@section('content')
  <div class="content">
    <section id="siswa" class="py-5">
      <div class="container">
        <div class="row justify-content-center">
          <h4 class="text-center fw-bold mb-0">Data Piket XII TJKT 2</h4>
          <p class="text-center text-secondary">Untuk Bulan Ini 2 Desember 2024 - 2 Januari 2024.</p>
          <div class="col">
            <div class="card border-0 shadow-sm">
              <div class="card-body">
                <div class="row justify-content-center mb-4 mt-2">
                  <div class="col-5">
                    <div class="input-group">
                      <input type="search" name="search" class="form-control" placeholder="Cari dengan nama...">
                      <button type="submit" class="btn btn-light border-1"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <table class="table">
                  <thead>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>20 Des 2024</td>
                      <td>Rizal Amin Maulana</td>
                      <td><i class="fa fa-check"></i></td>
                      <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, deleniti.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
