@extends('layout.main')

@section('container')
    <div class="container">
        <h1>Daftar Berita</h1>
        <div class="row">
            @foreach ($news as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Kategori: {{ $item->category->name ?? 'Tanpa Kategori' }}
                            </h6>
                            <p class="card-text">
                                {{ \Illuminate\Support\Str::limit($item->isi, 100) }}
                            </p>
                            <p class="text-muted">
                                Tanggal: {{ $item->tanggal_berita }}
                            </p>
                            <a href="{{ route('berita.detail', $item->id) }}" class="btn btn-primary">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
