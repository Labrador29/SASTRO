@extends('layout.main')
@section('container')
    <section id="hero" class="px-0">
        <div class="container text-center text-white">
            <div class="hero-title">
                <div class="hero-text">Organisasi<br> Dewan Ambalan Sastrodikoro</div>
                <h4>Gugus Depan SMK Negeri 1 Lumajang</h4>
            </div>
        </div>
    </section>

    @include('organisasi.pembina')
    @include('organisasi.struktur')
@endsection
