@extends('layouts.app')

@section('content')
<div class="container max-w-6xl mx-auto px-4">
    <h1 class="my-4 text-2xl font-semibold">Edit Bidang</h1>

    <form action="{{ route('bidang.update', $bidang) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_bidang" class="form-label">Nama Bidang</label>
            <input type="text" name="nama_bidang" id="nama_bidang" class="form-control" value="{{ $bidang->nama_bidang }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $bidang->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Foto Baru</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            <small class="text-secondary">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>

        <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">Update</button>
    </form>
</div>
@endsection