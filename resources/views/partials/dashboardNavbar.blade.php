<nav class="navbar navbar-expand navbar-light navbar-bg">
  <a class="sidebar-toggle js-sidebar-toggle">
    <i class="hamburger align-self-center"></i>
  </a>

  <div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
          <i class="align-middle" data-feather="user"></i> <span class="text-dark">{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item"><i class="align-middle" data-feather="user"></i> <span class="text-dark">{{ Auth::user()->name }}</span></a>
          <div class="dropdown-divider"></div>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn w-100 border-0 text-start">Logout</button>
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
