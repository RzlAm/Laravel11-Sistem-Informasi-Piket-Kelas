@extends('layouts.dashboard')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body pt-3">
          <form action="/dashboard/pengaturan/{{ request('id') }}/edit" method="POST" enctype="multipart/form-data">
            <div class="row">
              @csrf
              @method('PUT')

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="logo" class="w-100 cursor-pointer product-form-image">
                    <img id="imagePreview" src="{{ config('app.url') }}/storage/{{ $data->logo }}" width="300px" height="300px" class="object-fit-cover rounded bg-light" alt="logo kelas">
                  </label>
                  <input type="file" required class="d-none @error('logo') is-invalid @enderror" name="logo" accept="image/*" id="logo" onchange="updateImage(event)">
                  @error('logo')
                    <div class="invalid-feedback"></div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="nama_kelas" class="form-label">Nama Kelas</label>
                  <input type="text" required value="{{ @$data->nama_kelas ?? old('nama_kelas') }}" class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="Nama Kelas..." name="nama_kelas" id="nama_kelas">
                  @error('nama_kelas')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="float-end">
                  <a href="/dashboard/pengaturan" class="btn btn-secondary">Back</a>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function updateImage(event) {
      const image = document.getElementById("imagePreview");
      const file = event.target.files[0];

      if (file) {
        image.src = URL.createObjectURL(file);
      }
    }
  </script>
@endsection
