@extends('layouts.dashboard')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body pt-3">
          <form action="@if (request('id')) /dashboard/admin/{{ request('id') }}/edit @else /dashboard/admin/create @endif" method="POST">
            <div class="row">
              @csrf
              @if (request('id'))
                @method('PUT')
              @endif

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" required value="{{ @$data->name ?? old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nama..." name="name" id="name">
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" required value="{{ @$data->email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email..." name="email" id="email">
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password..." name="password" id="password">
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password_confirmation" class="form-label">Password Konfirmasi</label>
                  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password Konfirmasi..." name="password_confirmation" id="password_confirmation">
                  @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="float-end">
                  <a href="/dashboard/admin" class="btn btn-secondary">Back</a>
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
