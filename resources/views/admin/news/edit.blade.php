@extends('layouts.main')

@section('container')
    <style>
        .form-container {
            text-align: left;
        }

        .form-container label,
        .form-container input,
        .form-container textarea,
        .form-container button {
            display: block;
            margin-left: auto;
            margin-right: 0;
        }

        .form-container input,
        .form-container textarea,
        .form-container button {
            width: 100%;
            text-align: left;
        }

        .form-container button {
            width: auto;
            margin-right: 0;
        }

        .card {
            max-width: 800px;
            /* Meningkatkan lebar card */
            margin: 0 auto;
        }

        .card-body {
            padding: 20px;
        }
    </style>

    <div class="card shadow-sm text-black" style="margin-bottom: 20px;">
        <div class="card-body">
            <div class="container">
                <h1 class="text-black font-bold mb-6" style="font-size: 25px;">
                    <a href="{{ route('news.index') }}" class="text-gray-500">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a> Update Berita
                </h1>
                <hr>
                <br>
                <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data"
                    class="form-container">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium">Judul Berita <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="judul" value="{{ $news->judul }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan judul berita" required>
                    </div>
                    <div class="mb-4">
                        <label for="isi" class="block text-sm font-medium">Isi Berita <span
                                class="text-red-500">*</span></label>
                        <textarea name="isi"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan isi berita" rows="5" required>{{ $news->isi }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="tag_id" class="block text-sm font-medium">Kategori <span
                                class="text-red-500">*</span></label>
                        <select name="tag_id"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                            required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $news->tag_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="foto" class="block text-sm font-medium">Upload Foto Berita <span
                                class="text-red-500">*</span></label>
                        <input type="file" name="foto" id="foto"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                            accept="image/*">
                        <small class="text-gray-500">Kosongkan jika tidak ingin mengganti foto.</small>
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_berita" class="block text-sm font-medium">Tanggal Berita <span
                                class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_berita" value="{{ $news->tanggal_berita }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                    <button type="submit" class="btn-primary text-white py-2 px-4 rounded">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
