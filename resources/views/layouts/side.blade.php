<style>
    .nav-item.active {
        background-color: #5d85fe;
        border-radius: 1px;
    }

    .nav-item.active .nav-link {
        color: white;
        font-weight: bold;
    }

    .nav-item.active .nav-link i {
        color: white;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.143);
        border-radius: 5px;
    }
</style>


<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <img src="{{ asset('icons/LogoPutih.png') }}" height="50" width="190">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link custom-nav-link" href="{{ route('dashboard') }}">
            <i class="fa-solid fa-list"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item  {{ request()->routeIs('admin.home') ? 'active' : '' }}">
        <a class="nav-link custom-nav-link" href="{{ route('admin.home') }}">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('kegiatan.index') ? 'active' : '' }}">
        <a class="nav-link custom-nav-link" href="{{ route('kegiatan.index') }}">
            <i class="fa-solid fa-bookmark"></i>
            <span>Kegiatan</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('struktur.index') ? 'active' : '' }}">
        <a class="nav-link custom-nav-link" href="{{ route('struktur.index') }}">
            <i class="fa-solid fa-clipboard"></i>
            <span>Struktur</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('proker.index') ? 'active' : '' }}">
        <a class="nav-link custom-nav-link" href="{{ route('proker.index') }}">
            <i class="fa-solid fa-chart-column"></i>
            <span>Program Kerja</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('sponsor.index') ? 'active' : '' }}">
        <a class="nav-link custom-nav-link" href="{{ route('sponsor.index') }}">
            <i class="fa-solid fa-handshake"></i>
            <span>Sponsor</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Events -->
    <li class="nav-item {{ request()->routeIs('events.index') ? 'active' : '' }}">
        <a class="nav-link custom-nav-link" href="{{ route('events.index') }}">
            <i class="fa-solid fa-calendar-days"></i>
            <span>Acara</span>
        </a>
    </li>

    <!-- Nav Item - Users -->
    <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
        <a class="nav-link custom-nav-link" href="{{ route('users.index') }}">
            <i class="fa-solid fa-user"></i>
            <span>Users</span>
        </a>
    </li>

    <!-- Nav Item - Bidang -->
    <li class="nav-item {{ request()->routeIs('bidang.index') ? 'active' : '' }}">
        <a class="nav-link custom-nav-link" href="{{ route('bidang.index') }}">
            <i class="fa-solid fa-layer-group"></i>
            <span>Bidang</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('news.index') ? 'active' : '' }}">
        <a class="nav-link custom-nav-link" href="{{ route('news.index') }}">
            <i class="fa-solid fa-newspaper"></i>
            <span>Berita</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
