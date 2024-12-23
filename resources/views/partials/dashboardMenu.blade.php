<ul class="sidebar-nav">

  <li class="sidebar-item @if (@$active == 'Dashboard') active @endif">
    <a class="sidebar-link" href="/admin">
      <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
    </a>
  </li>

  <li class="sidebar-header">
    Data
  </li>

  <li class="sidebar-item @if (@$active == 'Challenges') active @endif">
    <a class="sidebar-link" href="/admin/challenges">
      <i class="align-middle" data-feather="database"></i> <span class="align-middle">Challenges</span>
    </a>
  </li>
  <li class="sidebar-item @if (@$active == 'Users') active @endif">
    <a class="sidebar-link" href="/admin/users">
      <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
    </a>
  </li>
</ul>
