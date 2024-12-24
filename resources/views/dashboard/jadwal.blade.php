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
              <a href="jadwal/create" class="btn btn-primary"><i class="align-middle" data-feather="plus"></i> Tambah Jadwal</a>
            </div>
          </div>
        </div>
        <div class="card-body pt-3">
          <div class="table-responsive">
            <table class="table">
              <thead>
                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'] as $day)
                  <th class="text-center">{{ $day }}</th>
                @endforeach
              </thead>
              <tbody>
                @for ($i = 0; $i < max(array_map(fn($day) => count($jadwal[$day]), ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'])); $i++)
                  <tr class="text-center">
                    @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'] as $day)
                      <td>
                        @if (isset($jadwal[$day][$i]))
                          {{ $jadwal[$day][$i]->siswa->name }} <br>
                          <a href="{{ url('/dashboard/jadwal/' . encrypt($jadwal[$day][$i]->id) . '/edit') }}" class="btn btn-success btn-sm">
                            <i class="align-middle" data-feather="edit-2"></i>
                          </a>
                          <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ encrypt($jadwal[$day][$i]->id) }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                            <i class="align-middle" data-feather="trash"></i>
                          </button>
                        @else
                          -
                        @endif
                      </td>
                    @endforeach
                  </tr>
                @endfor
              </tbody>
            </table>
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
          deleteForm.action = `/dashboard/jadwal/${id}`;
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
        deleteForm.setAttribute('action', `/dashboard/jadwal${itemId}`); // Set endpoint untuk hapus
      });
    });
  </script>
@endsection
