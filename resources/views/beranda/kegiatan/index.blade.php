@extends('layout.main')
@section('container')
    <section id="hero" class="px-0">
        <div class="container text-center text-white">
            <div class="hero-title">
                <div class="hero-text">Kegiatan Kami<br> Dewan Ambalan Sastrodikoro</div>
                <h4>Pangkalan SMK Negeri 1 Lumajang</h4>
            </div>
        </div>
    </section>

    @include('beranda.kegiatan.kegiatan')
    @include('beranda.kegiatan.partisipasi')
@endsection
