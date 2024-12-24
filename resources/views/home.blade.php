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
          <h2 class="fw-bold mb-5 text-white">Yang Paling Rajin Bulan Ini.</h2>
          <div class="col-md-6">
            <canvas id="rajinChart"></canvas>
          </div>
        </div>
      </div>
    </section>
    <section id="statistic" class="bg-white py-5">
      <div class="container">
        <div class="row text-center justify-content-center">
          <h3 class="fw-bold mb-5">Yang Paling Malas Bulan Ini.</h3>
          <div class="col-md-6">
            <canvas id="malasChart"></canvas>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
    const rajinData = @json($rajin);
    const malasData = @json($malas);;

    const rajinLabels = rajinData.map(item => item.name);
    const rajinCounts = rajinData.map(item => item.total);

    const malasLabels = malasData.map(item => item.name);
    const malasCounts = malasData.map(item => item.total);

    const rajinChart = document.getElementById('rajinChart').getContext('2d');
    new Chart(rajinChart, {
      type: 'bar',
      data: {
        labels: rajinLabels,
        datasets: [{
          label: 'Pengrajin',
          data: rajinCounts,
          backgroundColor: '#fff',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const malasChart = document.getElementById('malasChart').getContext('2d');
    new Chart(malasChart, {
      type: 'bar',
      data: {
        labels: malasLabels,
        datasets: [{
          label: 'Pemalas',
          data: malasCounts,
          backgroundColor: '#de113f',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection
