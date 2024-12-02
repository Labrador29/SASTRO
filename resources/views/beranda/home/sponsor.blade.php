<style>
    .smaller-img {
        max-width: 150px;
        height: auto;
        border-radius: 50%;
        object-fit: cover;
    }

    .custom-margin {
        margin-top: 100px;
    }

    .sponsor-container .row+.row {
        margin-top: 30px;
    }
</style>




<!-- Bagian Header -->
<div class="text-center custom-margin">
    <h2 class="fw-bold" data-aos="fade-up" data-aos-duration="500">Mitra & Partner</h2>
    <p data-aos="fade-up" data-aos-duration="1000">
        Kami bangga dapat berkolaborasi dengan berbagai mitra dan partner yang terpercaya untuk mencapai kesuksesan
        bersama.
    </p>
</div>

<div class="container sponsor-container mt-4" data-aos="fade-up" data-aos-duration="1500">
    @foreach ($sponsor->chunk(4) as $chunk)
        <div class="row justify-content-center">
            @foreach ($chunk as $item)
                <div class="col-lg-2 col-md-4 col-sm-6 col-6 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/sponsor/' . $item->logo) }}" class="img-fluid smaller-img"
                        alt="Logo">
                </div>
            @endforeach
        </div>
    @endforeach
</div>
