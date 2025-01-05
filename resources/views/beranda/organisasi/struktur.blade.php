<style>
    :root {
        --background-color: #ffffff;
        --default-color: #212529;
        --accent-color: #e84545;
        --contrast-color: #ffffff;
    }

    .section-title {
        text-align: center;
        padding-bottom: 40px;
        /* Jarak lebih kecil */
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

    .search-form {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin: 10px 0 20px;
    }

    .search-form .form-select {
        width: 450px;
        text-align: center;
        padding: 8px 10px;
        font-size: 14px;
    }

    .search-form .btn {
        width: 50px;
        padding: 8px 10px;
        font-size: 14px
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
</style>

<section id="team" class="team section light-background mb-5" data-aos="fade-up" data-aos-duration="1000">
    <div class="container section-title mt-5 w-75">
        <h2>Struktur Pengurus Dewan Ambalan</h2>
        <form action="" method="GET" class="search-form" style="margin-top: 20px;">
            <select name="year" class="form-select" style="border: 1px solid black;">
                <option value="" disabled>Pilih Tahun Struktur</option>
                @foreach ($years as $year)
                <option value="{{ $year }}" {{ $filterYear == $year ? 'selected' : '' }}>
                    {{ $year }}
                </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>

    <div class="container">
        <div class="row gy-5">
            @if ($pengurus->isEmpty())
            <p class="text-center">Tidak ada data pengurus untuk tahun {{ $filterYear }}</p>
            @else
            @foreach ($pengurus as $struktur)
            <div class="col-lg-3 col-md-6 member">
                <div class="member-img">
                    @if ($struktur->foto)
                    <img src="{{ asset($struktur->foto) }}" class="img-fluid"
                        alt="Foto {{ $struktur->nama_panjang }}">
                    @else
                    <img src="{{ asset('assets/struktur/std.jpg') }}" class="img-fluid" alt="Foto Default">
                    @endif
                </div>
                <div class="member-info">
                    <h4>{{ $struktur->nama_panjang }}</h4>
                    <span>{{ $struktur->NTA }}</span>
                    <span>{{ $struktur->Jabatan }}</span>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>