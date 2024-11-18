@extends('layouts.app')

@section('content')
<h1>Tambah Berita</h1>
<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="judul" class="form-label">Judul Berita</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul berita" required>
    </div>
    <div class="mb-3">
        <label for="isi" class="form-label">Isi Berita</label>
        <textarea class="form-control" id="isi" name="isi" placeholder="Masukkan isi berita" rows="5" required></textarea>
    </div>
    <div class="mb-3">
        <label for="tag_id" class="form-label">Kategori</label>
        <select class="form-control" id="tag_id" name="tag_id" required>
            <option value="">Pilih Kategori</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="foto">Foto Berita</label>
            <input type="file" name="foto" class="form-control">
        </div>
    </div>
    <div class="mb-3">
        <label for="tanggal_berita" class="form-label">Tanggal Berita</label>
        <input type="date" class="form-control" id="tanggal_berita" name="tanggal_berita" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection