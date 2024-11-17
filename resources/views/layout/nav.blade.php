<link rel="stylesheet" href="{{ asset('css/layout/nav.css') }}">
<nav class="navbar navbar-expand-lg navbar-dark py-3 fixed-top" data-aos="fade-down">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('icons/Logo.png') }}" height="50" width="190">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('kegiatan') ? 'active' : '' }}" href="/kegiatan">Kegiatan</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('organisasi') ? 'active' : '' }}" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Organisasi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/organisasi">Pembina</a></li>
                        <li><a class="dropdown-item" href="/organisasi">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="/organisasi">Alumni</a></li>
                    </ul>
                </li>
            </ul>
            <!-- <div class="d-flex">
                <a href="/login" class="btn btn-primary">Login</a>
            </div> -->
        </div>
    </div>
</nav>