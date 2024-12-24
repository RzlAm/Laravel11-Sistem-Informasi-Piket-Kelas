@extends('layouts.main')
@section('content')
  <div class="content">
    <section id="siswa" class="py-5">
      <div class="container">
        <div class="row justify-content-center">
          <h4 class="text-center fw-bold mb-0">Jadwal Piket {{ $nama_kelas }}</h4>
          <p class="text-center text-secondary">Laksanakan piket sesuai jadwal.</p>
          <div class="col">
            <div class="card border-0 shadow-sm">
              <div class="card-body">
                <table class="table">
                  <thead>
                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'] as $day)
                      <th class="text-center">{{ $day }}</th>
                    @endforeach
                  </thead>
                  <tbody>
                    @for ($i = 0; $i < max(array_map(fn($day) => count($jadwal[$day]), ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'])); $i++)
                      <tr class="text-center">
                        @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'] as $day)
                          <td>
                            @if (isset($jadwal[$day][$i]))
                              {{ $jadwal[$day][$i]->siswa->name }} <br>
                            @else
                              -
                            @endif
                          </td>
                        @endforeach
                      </tr>
                    @endfor
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
