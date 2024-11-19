<section id="agenda" style="margin-top: 50px;" data-aos="fade-up">
    <div class="container py-5">
        <div class="header-agenda text-center">
            <h2 class="fw-bold">Bidang Dewan Ambalan</h2>
            <p class="text-secondary">Di dalam dewan ambalan sastrodikoro terdapat beberapa bidang yang memiliki tugas
                berbeda-beda</p>
        </div>

        <!-- Display Data -->

        @foreach ($bidangs->chunk(2) as $row) <!-- Membagi data menjadi grup per 3 -->
        <div class="row mt-4 justify-content-center">
            @foreach ($row as $bidang)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 d-flex flex-column">
                    <img src="{{ asset('assets/bidang/' . $bidang->gambar) }}" class="card-img-top" alt="{{ $bidang->nama_bidang }}" style="object-fit: cover; height: 200px;">
                    <div class="card-body text-center flex-grow-1">
                        <h5 class="card-title">{{ $bidang->nama_bidang }}</h5>
                        <p class="card-text">{{ $bidang->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>