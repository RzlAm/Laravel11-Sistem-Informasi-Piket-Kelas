<!doctype html>
<html lang="id" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="rzlam_in">
  <title>{{ config('app.name') }} - {{ @$title }}</title>
  <link href="{{ config('app.url') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ config('app.url') }}/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-body-tertiary">
  @if (session()->has('error'))
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
      <div class="toast-header bg-danger">
        <img src="{{ config('app.url') }}/storage/{{ $logo }}" class="rounded me-2 bg-white" width="25 px" alt="logo kelas">
        <strong class="me-auto text-white">{{ config('app.name') }}</strong>
        <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {{ session('error') }}
      </div>
    </div>
  @endif
  @if (session()->has('success'))
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
      <div class="toast-header bg-success">
        <img src="{{ config('app.url') }}/storage/{{ $logo }}" class="rounded me-2 bg-white" width="25 px" alt="logo kelas">
        <strong class="me-auto">{{ config('app.name') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {{ session('success') }}
      </div>
    </div>
  @endif

  <nav class="navbar navbar-expand-lg bg-white">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="/">
        <img src="{{ config('app.url') }}/storage/{{ $logo }}" width="35px" alt="Icon website">
        {{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ @$active == 'home' ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ @$active == 'jadwal' ? 'active' : '' }}" href="/jadwal">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ @$active == 'piket' ? 'active' : '' }}" href="/piket">Piket</a>
          </li>
          <li class="nav-item d-flex align-items-center ms-0 ms-lg-3 mt-3 mt-lg-0">
            @auth
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm ms-0 text-start text-lg-center ms-lg-3 px-3 w-100 w-lg-auto"><i class="fa-regular fa-user"></i>&nbsp;&nbsp;Rizal | Logout</button>
              </form>
            @else
              <a href="/login" class="btn btn-success btn-sm w-100 w-lg-auto px-0 px-lg-3">Login</a>
            @endauth
          </li>
        </ul>
      </div>
    </div>
  </nav>
