<section id="agenda" style="margin-top: 10px;" data-aos="fade-up">
    <div class="container py-5">
        <div class="header-agenda text-center">
            <h2 class="fw-bold">Kegiatan Partisipasi</h2>
            <p class="text-secondary">Kegiatan Dewan Ambalan Sastrodikoro bukan hanya disekolah saja, <br> tapi juga
                diluar sekolah dan bukan hanya di tingkat kabupaten tapi sampai ke tingkat nasional</p>
        </div>

        <div class="swiper mySwiper py-5">
            <div class="swiper-wrapper">
                @foreach($partisipasi as $item)
                <div class="swiper-slide">
                    <div class="card border-0">
                        @if ($item->foto)
                        <img src="{{ asset('assets/kegiatan/' . $item->foto) }}" class="img-fluid mb-3" alt="{{ $item->nama }}">
                        @else
                        Tidak ada
                        @endif
                        <div class="konten-agenda">
                            <p class="mb-3 text-secondary">{{ $item->tanggal }}</p>
                            <h4 class="fw-bold mb-3">{{ $item->nama }}</h4>
                            <a href="/kegiatan" class="text-decoration-none text-danger">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
</section>