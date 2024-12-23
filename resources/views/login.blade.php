@extends('layouts.main')
@section('content')
  <div class="content" style="margin-top: 70px; margin-bottom:70px">
    <section id="login">
      <div class="container">
        <div class="row justify-content-center">
          <div class="text-center">
            <img src="{{ config('app.url') }}/images/icon.png" width="60px" alt="logo kelas">
          </div>
          <h3 class="text-center mb-4 mt-2">Login</h3>
          <div class="col-md-5">
            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="/login" method="POST">
              @csrf
              <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Username..." name="name">
                <label for="name">Username</label>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password...">
                <label for="password">Password</label>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" checked name="remember"> Remember me
                </label>
              </div>
              <button class="w-100 btn btn-lg btn-success" type="submit">Masuk</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
