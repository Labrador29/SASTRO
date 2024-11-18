@extends('layouts.app')

@section('content')
<h1>Ubah Berita</h1>
<form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="judul" class="form-label">Judul Berita</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ $news->judul }}" required>
    </div>
    <div class="mb-3">
        <label for="isi" class="form-label">Isi Berita</label>
        <textarea class="form-control" id="isi" name="isi" rows="5" required>{{ $news->isi }}</textarea>
    </div>
    <div class="mb-3">
        <label for="tag_id" class="form-label">Kategori</label>
        <select class="form-control" id="tag_id" name="tag_id" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $news->tag_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="tanggal_berita" class="form-label">Tanggal Berita</label>
        <input type="date" class="form-control" id="tanggal_berita" name="tanggal_berita" value="{{ $news->tanggal_berita }}" required>
    </div>
    <div class="form-group">
        <label for="foto">Foto Berita</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection