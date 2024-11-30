<style>
    :root {
        --background-color: #ffffff;
        --default-color: #212529;
        --accent-color: #e84545;
        --contrast-color: #ffffff;
    }

    .section-title {
        text-align: center;
        padding-bottom: 60px;
        position: relative;
    }

    .section-title h2 {
        font-size: 32px;
        font-weight: 700;
        position: relative;
    }

    .section-title h2:before,
    .section-title h2:after {
        content: "";
        width: 50px;
        height: 2px;
        background: #f4b351;
        display: inline-block;
    }

    .section-title h2:before {
        margin: 0 15px 10px 0;
    }

    .section-title h2:after {
        margin: 0 0 10px 15px;
    }

    @media (max-width: 400px) {

        .section-title h2:before,
        .section-title h2:after {
            display: none;
        }
    }

    .section-title p {
        margin-bottom: 0;
    }

    .team .member {
        position: relative;
        text-align: center;
    }

    .team .member .member-img {
        margin: 0 auto;
        border-radius: 50%;
        overflow: hidden;
        position: relative;
        border: 4px solid var(--background-color);
        box-shadow: 0 15px 35px -10px rgba(0, 0, 0, 0.2);
        width: 200px;
        height: 200px;
    }

    .team .member .member-img img {
        position: relative;
        z-index: 1;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .team .member .member-img .social {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.6);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 2;
        padding-bottom: 20px;
        transition: 0.3s;
        visibility: hidden;
        opacity: 0;
    }

    .team .member .member-img .social a {
        transition: 0.3s;
        color: var(--contrast-color);
        font-size: 20px;
        margin: 0 8px;
    }

    .team .member .member-img .social a:hover {
        color: #f4b351;
    }

    .team .member .member-info {
        margin-top: 30px;
    }

    .team .member .member-info h4 {
        font-weight: 700;
        margin-bottom: 6px;
        font-size: 18px;
    }

    .team .member .member-info span {
        font-style: italic;
        display: block;
        font-size: 15px;
        color: color-mix(in srgb, var(--default-color), transparent 40%);
        margin-bottom: 10px;
    }

    .team .member .member-info p {
        margin-bottom: 0;
        font-size: 14px;
    }

    .team .member:hover .member-img .social {
        padding-bottom: 0;
        visibility: visible;
        opacity: 1;
    }
</style>

<section id="team" class="team section light-background mb-5" data-aos="fade-up" data-aos-duration="1000"
    style="margin-top: 80px;">
    <div class="container section-title mt-5 w-75">
        <h2>Struktur Dewan Ambalan Sastrodikoro</h2>
    </div>

    <div class="container">
        <div class="row gy-5">
            @foreach ($pengurus as $struktur)
                <div class="col-lg-3 col-md-6 member">
                    <div class="member-img">
                        @if ($struktur->foto)
                            <img src="{{ asset($struktur->foto) }}" class="img-fluid" alt="">
                        @else
                            <img src="{{ asset('assets/struktur/std.jpg') }}" class="img-fluid" alt="">
                        @endif
                    </div>
                    <div class="member-info">
                        <h4>{{ $struktur->nama_panjang }}</h4>
                        <span>{{ $struktur->Jabatan }} | 12345678</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
