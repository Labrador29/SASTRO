@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $news->judul }}</h1>
    <p class="text-muted">Kategori: {{ $news->category->name ?? 'Tanpa Kategori' }}</p>
    <p class="text-muted">Tanggal: {{ $news->tanggal_berita }}</p>
    <div class="content">
        <p>{{ $news->isi }}</p>
    </div>
    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali ke Daftar Berita</a>
</div>
@endsection