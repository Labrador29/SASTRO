<section id="agenda" style="margin-top: 50px;" data-aos="fade-up">
    <div class="container py-5">
        <div class="header-agenda text-center">
            <h2 class="fw-bold">Program Kerja Dewan Ambalan</h2>
            <p class="text-secondary">Dewan Ambalan Sastrodikoro memiliki beberapa program kerja setiap tahunnya dan
                pastinya kegiatan nya seru seru lho!</p>
        </div>

        <div class="row mt-4">
            @foreach ($operasional->chunk(4) as $chunk)
            @foreach ($chunk as $item)
            <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center"
                style="padding-left: 1px; padding-right: 1px;">
                <div class="card h-100 text-center shadow-sm" style="border-radius: 15px; width: 400px; height: 400px;">
                    @if ($item->foto)
                    <img src="{{ asset('assets/kegiatan/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama }}" style="width: 100%; height: 200px; object-fit: cover;">
                    @else
                    Tidak ada
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item->nama }}</h5>
                        <p class="card-text">{{ $item->deskripsi }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>
</section>