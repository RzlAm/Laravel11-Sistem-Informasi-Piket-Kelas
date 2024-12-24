@extends('layouts.dashboard')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body pt-3">
          <form action="@if (request('id')) /dashboard/piket/{{ request('id') }}/edit @else /dashboard/piket/create @endif" method="POST">
            <div class="row">
              @csrf
              @if (request('id'))
                @method('PUT')
              @endif

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="siswa_id" class="form-label">Nama Siswa</label>
                  <select name="siswa_id" id="siswa_id" class="form-select  @error('siswa_id') is-invalid @enderror">
                    @foreach ($siswas as $siswa)
                      <option value="{{ $siswa->id }}" {{ $siswa->id == @$data->siswa_id ? 'selected' : '' }}>{{ $siswa->name . ' - ' . $siswa->hari }}</option>
                    @endforeach
                  </select>
                  @error('siswa_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input type="date" required value="{{ @$data->tanggal ?? old('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Nama siswa..." name="tanggal" id="tanggal">
                  @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select name="status" id="status" class="form-select  @error('status') is-invalid @enderror">
                    <option value="Piket" {{ strtolower(@$data->status) == 'piket' ? 'selected' : '' }}>Piket</option>
                    <option value="Tidak Piket" {{ strtolower(@$data->status) == 'tidak piket' ? 'selected' : '' }}>Tidak Piket</option>
                  </select>
                  @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="keterangan" class="form-label">Keterangan</label>
                  <textarea name="keterangan" id="keterangan" rows="9" class="form-control @error('keterangan') is-invalid @enderror">{{ @$data->keterangan ?? old('keterangan') }}</textarea>
                </div>
                <div class="float-end">
                  <a href="/dashboard/piket" class="btn btn-secondary">Back</a>
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
