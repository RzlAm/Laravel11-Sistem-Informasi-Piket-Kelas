@extends('layouts.main')
@section('content')
  <div class="content">
    <section id="hero" class="d-flex align-items-center justify-content-center" style="height: 90vh">
      <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ config('app.url') }}/images/icon.png" alt="Logo Kelas" width="72">
        <h1 class="display-5 fw-bold text-body-emphasis">Sistem Informasi Piket XII TJKT 2</h1>
        <div class="col-lg-6 mx-auto">
          <p class="lead mb-4">Aplikasi pencatat piket kelas XII TJKT 2.<br>Yang ndak piket denda 👊</p>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center w-100">
            <a href="/jadwal" class="btn btn-success btn-lg px-4 gap-3">Jadwal Piket</a>
            <a href="/piket" class="btn btn-outline-danger btn-lg px-4">Data Piket</a>
          </div>
        </div>
      </div>
    </section>
    <section id="statistic" class="bg-success py-5 d-flex align-items-center" style="height: 500px">
      <div class="container">
        <div class="row text-center justify-content-center">
          <h2 class="fw-bold mb-0 text-white">Yang Paling Rajin Bulan Ini.</h2>
          <p class="text-white mb-5">Untuk Bulan Ini 2 Desember 2024 - 2 Januari 2024</p>
          <div class="col-md-6">
            <canvas id="rajinChart"></canvas>
          </div>
        </div>
      </div>
    </section>
    <section id="statistic" class="bg-white py-5">
      <div class="container">
        <div class="row text-center justify-content-center">
          <h3 class="fw-bold mb-0">Poin Pelanggaran Tidak Piket.</h3>
          <p class="text-secondary mb-5">Untuk Bulan Ini 2 Desember 2024 - 2 Januari 2024</p>
          <div class="col-md-6">
            <canvas id="malasChart"></canvas>
          </div>
        </div>
      </div>
    </section>
    <section id="statistic" class="py-5">
      <div class="container">
        <div class="row text-center justify-content-center">
          <h3 class="fw-bold mb-0">Si Paling Jarang Piket.</h3>
          <p class="text-secondary mb-5">Untuk Bulan Ini 2 Desember 2024 - 2 Januari 2024</p>
          <table class="table w-auto fs-5">
            <tbody>
              <tr>
                <td class="text-end">Nama</td>
                <td> : </td>
                <td class="text-start">Rizal Amin M</td>
              </tr>
              <tr>
                <td class="text-end">Jumlah Piket</td>
                <td> : </td>
                <td class="text-start">20 Kali</td>
              </tr>
              <tr>
                <td class="text-end">Jumlah Tidak Piket</td>
                <td> : </td>
                <td class="text-start">100 Kali</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
  <script>
    const rajin = document.getElementById('rajinChart').getContext('2d');
    const malas = document.getElementById('malasChart').getContext('2d');
    const malasChart = new Chart(malas, {
      type: 'bar',
      data: {
        labels: ['Anis', 'Risa', 'Amir'],
        datasets: [{
          label: 'Pemalas',
          data: [30, 40, 90],
          backgroundColor: [
            '#11deb0',
            '#d8d511',
            '#de113f',
          ],
          textColor: ["#fff"],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        },
      }
    });
    const rajinChart = new Chart(rajin, {
      type: 'bar',
      data: {
        labels: ['Anis', 'Risa', 'Amir'],
        datasets: [{
          label: 'Pengrajin',
          data: [30, 40, 90],
          backgroundColor: [
            '#fff',
          ],
          textColor: ["#fff"],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            labels: {
              color: 'white'
            }
          }
        },
        scales: {
          x: {
            ticks: {
              color: 'white'
            }
          },
          y: {
            ticks: {
              color: 'white'
            }
          }
        }
      }
    });
  </script>
@endsection
