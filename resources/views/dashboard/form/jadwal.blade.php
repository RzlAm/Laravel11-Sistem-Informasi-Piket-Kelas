@extends('layouts.dashboard')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body pt-3">
          <form action="@if (request('id')) /dashboard/jadwal/{{ request('id') }}/edit @else /dashboard/jadwal/create @endif" method="POST">
            <div class="row">
              @csrf
              @if (request('id'))
                @method('PUT')
              @endif
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="siswa_id" class="form-label">Nama Siswa</label>
                  <select name="siswa_id" id="siswa_id" class="form-select @error('siswa_id') is-invalid @enderror">
                    @foreach ($siswas as $siswa)
                      <option value="{{ $siswa->id }}" {{ @$data->siswa_id == $siswa->id || $siswa->id == old('siswa_id') ? 'selected' : '' }}>{{ $siswa->name }}</option>
                    @endforeach
                  </select>
                  @error('siswa_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="hari" class="form-label">Hari</label>
                  <select name="hari" id="hari" class="form-select @error('hari') is-invalid @enderror">
                    @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'] as $day)
                      <option value="{{ $day }}" {{ strtolower(@$data->hari) == strtolower($day) || strtolower($day) == strtolower(old('hari')) ? 'selected' : '' }}>
                        {{ ucfirst($day) }}
                      </option>
                    @endforeach
                  </select>
                  @error('hari')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="float-end">
                  <a href="/dashboard/jadwal" class="btn btn-secondary">Back</a>
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
