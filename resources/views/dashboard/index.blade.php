@extends('layouts.dashboard')
@section('content')
  <div class="row">
    <div class="col d-flex">
      <div class="w-100">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col mt-0">
                  <h5 class="card-title">Total Siswa</h5>
                </div>
                <div class="col-auto">
                  <div class="stat text-primary">
                    <i class="align-middle" data-feather="users"></i>
                  </div>
                </div>
              </div>
              <h1 class="mt-1 mb-3"> {{ $totalSiswa }}</h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <canvas id="rajinChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <canvas id="malasChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
            backgroundColor: '#11deb0',
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
