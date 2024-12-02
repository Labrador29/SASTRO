@extends('layout.main')

@section('container')
    <section id="hero" class="px-0">
        <div class="container text-center text-white">
            <div class="hero-title">
                <div class="hero-text">Detail Berita<br> Dewan Ambalan Sastrodikoro</div>
                <h4>Gugus Depan SMK Negeri 1 Lumajang</h4>
            </div>
        </div>
    </section>
    <div class="container" style="margin-top: 50px;">
        <div class="row align-items-center">
            <!-- Bagian Gambar -->
            <div class="col-md-4">
                <img src="{{ asset($news->image ?? 'assets/keg8.JPG') }}" class="img-fluid rounded" alt="Gambar Berita">
            </div>
            <!-- Bagian Teks -->
            <div class="col-md-8">
                <h1>{{ $news->judul }}</h1>
                <p class="text-muted">Kategori: {{ $news->category->name ?? 'Tanpa Kategori' }}</p>
                <p class="text-muted">Tanggal: {{ $news->tanggal_berita }}</p>
                <div class="content">
                    <p>{{ $news->isi }}</p>
                </div>
                {{-- <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali ke Daftar Berita</a> --}}
            </div>
        </div>
    </div>
@endsection
