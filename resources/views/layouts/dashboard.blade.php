<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="{{ config('app.url') }}/favicon.ico" type="image/x-icon" />

  <title>Admin {{ config('app.name') }} - {{ @$title }}</title>
  <link rel="stylesheet" href="{{ config('app.url') }}/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ config('app.url') }}/css/style.css">
  <link href="{{ config('app.url') }}/dist/css/app.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
</head>

<body>
  @if (session()->has('error'))
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
      <div class="toast-header bg-danger">
        <img src="{{ config('app.url') }}/images/icon.png" class="rounded me-2 bg-white" width="25 px" alt="logo kelas">
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
        <img src="{{ config('app.url') }}/images/icon.png" class="rounded me-2 bg-white" width="25 px" alt="logo kelas">
        <strong class="me-auto">{{ config('app.name') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {{ session('success') }}
      </div>
    </div>
  @endif
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
          <span class="align-middle">{{ config('app.name') }} Dashboard</span>
        </a>
        @include('partials.dashboardMenu')
      </div>
    </nav>
    <div class="main">
      @include('partials.dashboardNavbar')
      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><strong>{{ @$title }}</strong></h1>
          @yield('content')
        </div>
      </main>
      @include('partials.dashboardFooter')
    </div>
  </div>
  <script src="{{ config('app.url') }}/dist/js/app.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var toastElements = document.querySelectorAll('.toast');
      toastElements.forEach(function(toastElement) {
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
      });
    });
  </script>
</body>

</html>
