@extends('layout.main')

@section('container')
    <style>
        p {
            text-indent: 30px;
            /* Sesuaikan nilai sesuai kebutuhan */
            margin-bottom: 15px;
            /* Menambahkan jarak antar paragraf */
        }
    </style>

    <section id="hero" class="px-0">
        <div class="container text-center text-white">
            <div class="hero-title">
                <div class="hero-text">Detail Berita<br> Dewan Ambalan Sastrodikoro</div>
                <h4>Pangkalan SMK Negeri 1 Lumajang</h4>
            </div>
        </div>
    </section>
    <div class="container" style="margin-top: 50px;">
        <div class="row align-items-center">
            <!-- Bagian Gambar -->
            <div class="col-md-4">
                <img src="{{ asset('assets/berita/' . $news->foto) }}" class="img-fluid mb-3" alt="Gambar Berita">
            </div>
            <!-- Bagian Teks -->
            <div class="col-md-8">
                <h1>{{ $news->judul }}</h1>
                <p class="text-muted">Kategori: {{ $news->category->name ?? 'Tanpa Kategori' }}</p>
                <p class="text-muted">Tanggal: {{ Carbon\Carbon::parse($news->tanggal_berita)->format('d-m-Y') }}</p>
                <div class="content">
                    @foreach (explode("\n", $news->isi) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
                {{-- <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali ke Daftar Berita</a> --}}
            </div>
        </div>
    </div>
@endsection
