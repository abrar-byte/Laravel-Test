<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/">
          <span data-feather="skip-back"></span>
          Back to Home
        </a>
      </li>

    </ul>

    @can('admin')

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Administrator</span>

    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/organisasis*') ? 'active' : '' }}" href="/dashboard/organisasis">
          <span data-feather="grid"></span>
          Organisasi
        </a>

      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/anggotas*') ? 'active' : '' }}" href="/dashboard/anggotas">
          <span data-feather="users"></span>
          Anggota
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/jadwals*') ? 'active' : '' }}" href="/dashboard/jadwals">
          <span data-feather="calendar"></span>
          Jadwal Acara
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/hasils*') ? 'active' : '' }}" href="/dashboard/hasils">
          <span data-feather="play"></span>
          Hasil Acara
        </a>

      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/olahragas*') ? 'active' : '' }}" href="/dashboard/olahragas">
          <span data-feather="sliders"></span>
          Cabang Olahraga
        </a>

      </li>

    </ul>
    @endcan


  </div>
</nav>