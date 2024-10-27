<link rel="stylesheet" href="{{ asset('css/layout/nav.css') }}">
<nav class="navbar navbar-expand-lg navbar-dark py-3 fixed-top" data-aos="fade-down">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('icons/Logo.png') }}" height="50" width="190" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Kegiatan</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Organisasi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Pembina</a></li>
                        <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex">
                <button class="btn btn-primary">Login</button>
            </div>
        </div>
    </div>
</nav>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".dropdown").forEach(function(dropdown) {
            dropdown.addEventListener("show.bs.dropdown", function() {
                let menu = this.querySelector(".dropdown-menu");
                menu.classList.add("show");
            });

            dropdown.addEventListener("hide.bs.dropdown", function() {
                let menu = this.querySelector(".dropdown-menu");
                menu.classList.remove("show");
            });
        });
    });
</script>
