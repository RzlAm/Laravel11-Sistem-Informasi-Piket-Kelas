@extends('layouts.dashboard')
@section('content')
  <div class="row">
    <div class="col d-flex">
      <div class="w-100">
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Total Users</h5>
                  </div>

                  <div class="col-auto">
                    <div class="stat text-primary">
                      <i class="align-middle" data-feather="users"></i>
                    </div>
                  </div>
                </div>
                <h1 class="mt-1 mb-3">33</h1>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Total Challenges</h5>
                  </div>

                  <div class="col-auto">
                    <div class="stat text-primary">
                      <i class="align-middle" data-feather="database"></i>
                    </div>
                  </div>
                </div>
                <h1 class="mt-1 mb-3">3</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <h5 class="card-title mb-0">Leaderboard</h5>
        </div>
        <table class="table table-hover my-0">
          <thead>
            <tr>
              <th>Rank</th>
              <th>Name</th>
              <th>Points</th>
              <th>Solved</th>
            </tr>
          </thead>
          <tbody>
            {{-- @if ($leaderBoard->isEmpty())
              <tr>
                <td colspan="4" class="text-center text-secondary">--- Empty data ---</td>
              </tr>
            @endif --}}
            {{-- @foreach ($leaderBoard as $item) --}}
            {{-- <tr>
                <td># {{ $loop->index + 1 }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->total_points }}</td>
                <td>{{ $item->solved }}</td>
              </tr> --}}
            {{-- @endforeach --}}
          </tbody>
        </table>
      </div>
    </div>
  @endsection
