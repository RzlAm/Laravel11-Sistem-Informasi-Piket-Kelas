<ul class="sidebar-nav">

  <li class="sidebar-item @if (@$active == 'Dashboard') active @endif">
    <a class="sidebar-link" href="/dashboard">
      <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
    </a>
  </li>

  <li class="sidebar-header">
    Data
  </li>

  <li class="sidebar-item @if (@$active == 'Data Piket') active @endif">
    <a class="sidebar-link" href="/dashboard/piket">
      <i class="align-middle" data-feather="database"></i> <span class="align-middle">Data Piket</span>
    </a>
  </li>
  <li class="sidebar-item @if (@$active == 'Data Siswa') active @endif">
    <a class="sidebar-link" href="/dashboard/siswa">
      <i class="align-middle" data-feather="users"></i> <span class="align-middle">Data Siswa</span>
    </a>
  </li>
  <li class="sidebar-item @if (@$active == 'Jadwal') active @endif">
    <a class="sidebar-link" href="/dashboard/jadwal">
      <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Jadwal Piket</span>
    </a>
  </li>
  <li class="sidebar-item @if (@$active == 'Pengaturan') active @endif">
    <a class="sidebar-link" href="/dashboard/pengaturan">
      <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Pengaturan</span>
    </a>
  </li>
</ul>
