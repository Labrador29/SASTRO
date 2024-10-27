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

<style>
    .dropdown-menu {
        background-color: #333;
        border-radius: 8px;
        padding: 0.5rem 0;
        border: none;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        opacity: 0;
        transform: translateY(-10px);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .dropdown-menu.show {
        opacity: 1;
        transform: translateY(0);
    }

    .dropdown-item {
        color: #fff;
        padding: 10px 20px;
        transition: background-color 0.3s ease;
    }

    .dropdown-item:hover {
        background-color: #555;
        color: #fff;
    }
</style>

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
