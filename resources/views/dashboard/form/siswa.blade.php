@extends('layouts.dashboard')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body pt-3">
          <form action="@if (request('id')) /dashboard/siswa/{{ request('id') }}/edit @else /dashboard/siswa/create @endif" method="POST">
            <div class="row">
              @csrf
              @if (request('id'))
                @method('PUT')
              @endif

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Siswa</label>
                  <input type="text" required value="{{ @$data->name ?? old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nama siswa..." name="name" id="name">
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="float-end">
                  <a href="/dashboard/siswa" class="btn btn-secondary">Back</a>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection
