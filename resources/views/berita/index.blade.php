@extends('layout.main')
@section('container')
<section id="hero" class="px-0">
    <div class="container text-center text-white">
        <div class="hero-title">
            <div class="hero-text">Welcome To <br> Dewan Ambalan Sastrodikoro</div>
            <h4>Gugus Depan SMK Negeri 1 Lumajang</h4>
        </div>
    </div>
</section>
<section id="detail-berita" class="py-5" style="margin-top: 70px;" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <!-- Konten Berita -->
            <div class="col-lg-8 mx-auto">
                <div class="text-center">

                    <h1 class="fw-bold">Giat Penggalang Sastrodikoro (GLADIATOR)</h1>
                    <p class="text-muted">Dipublikasikan pada 17 November 2024</p>
                    <img src="{{ asset('program/proker.png') }}" class="img-fluid rounded-3 mb-4"
                        alt="">
                </div>
                <div class="content">
                    Isi berita Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam autem quam ab beatae eveniet. Error sit, sapiente soluta repellendus quam neque ex quisquam aliquid et accusantium aperiam? Itaque est suscipit rerum voluptate officiis. Voluptas autem est adipisci velit, temporibus accusamus! Voluptate deserunt, culpa, facere ipsam deleniti accusamus adipisci ipsum omnis vel commodi cum. Illum ut amet molestias distinctio! Quas rem ab molestiae minus eaque eligendi omnis tempore sit, doloribus illo quod illum quam modi quaerat? Maiores quam voluptate ipsam possimus odit impedit quidem eos commodi suscipit. Sed incidunt veniam laborum eveniet laboriosam iste eligendi, ipsum dicta, voluptas asperiores quam amet!
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Komentar -->
@endsection