@extends('layout.main')
@section('container')
    <style>
        .img-small {
            max-width: 75%;
            height: auto;
        }
    </style>
    <section id="hero" class="px-0">
        <div class="container text-center text-white">
            <div class="hero-title">
                <div class="hero-text">About Us<br> Dewan Ambalan Sastrodikoro</div>
                <h4>Gugus Depan SMK Negeri 1 Lumajang</h4>
            </div>
        </div>
    </section>

    @include('beranda.about.content')
@endsection
