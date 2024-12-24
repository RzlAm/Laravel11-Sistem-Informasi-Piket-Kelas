@extends('layouts.dashboard')
@section('content')
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Kamu serius ingin menghapus <strong id="challengeName"></strong>? Data tidak bisa kembali setelah dihapus.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-md-8">
              <a href="siswa/create" class="btn btn-primary"><i class="align-middle" data-feather="plus"></i> Tambah Siswa</a>
            </div>
            <div class="col-md-4">
              <form class="d-flex mx-auto mt-4 mt-lg-0" role="search" method="GET">
                <div class="input-group">
                  <button class="btn btn-white rounded-start border-start border-top border-bottom" type="submit"><i class="align-middle" data-feather="search"></i></button>
                  <input class="form-control shadow-none border-start-0" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ @request('search') }}">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-body pt-3">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Jadwal</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                @if ($data->isEmpty())
                  <tr>
                    <td colspan="7" class="text-center text-secondary">--- Empty data ---</td>
                  </tr>
                @endif
                @foreach ($data as $item)
                  <tr>
                    <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                      <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ encrypt($item->id) }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i class="align-middle" data-feather="trash-2"></i></button>
                      <a href="siswa/{{ encrypt($item->id) }}/edit" class="btn btn-success btn-sm"><i class="align-middle" data-feather="edit"></i></a>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <div class="float-end">
            {{ $data->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const deleteButtons = document.querySelectorAll('.btn-delete');
      const modal = document.getElementById('confirmDeleteModal');
      const deleteForm = document.getElementById('deleteForm');

      deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
          const id = button.getAttribute('data-id');
          deleteForm.action = `/dashboard/siswa/${id}`;
        });
      });
    });

    document.getElementById('confirmDeleteModal').addEventListener('shown.bs.modal', function() {
      const deleteButton = document.getElementById('deleteButton');
      if (deleteButton) {
        deleteButton.focus();
      }
    });

    document.querySelectorAll('.btn-delete').forEach(button => {
      button.addEventListener('click', function() {
        const itemId = this.getAttribute('data-id'); // Ambil ID item
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.setAttribute('action', `/dashboard/siswa/${itemId}`); // Set endpoint untuk hapus
      });
    });
  </script>
@endsection
