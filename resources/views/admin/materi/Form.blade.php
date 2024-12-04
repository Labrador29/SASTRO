@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="position-relative" style="max-width: 600px; margin: 0 auto;">
        <!-- Tulisan Tambah Bidang -->
        <h1 class="text-black font-bold mb-6" style="font-size: 30px;">
            <a href="{{ route('materi.index') }}" class="text-gray-500">
                <i class="fa-solid fa-arrow-left"></i>
            </a> {{ isset($materi) ? 'Edit materi' : 'Create materi' }}
        </h1>

        <!-- Kotak Form -->
        <div class="card shadow-sm text-black">
            <div class="card-body">
                <form action="{{ isset($materi) ? route('materi.update', $materi) : route('materi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($materi))
                    @method('PUT')
                    @endif

                    <!-- judul materi -->
                    <div class="form-group mb-3">
                        <label for="judul">Judul materi</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $materi->judul ?? '') }}" required>
                    </div>

                    <!-- File materi -->
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" name="file" id="file" class="form-control">
                        @if (isset($materi) && $materi->file_path)
                        <p>File Saat Ini: <a href="{{ Storage::url($materi->file_path) }}" target="_blank">Lihat File</a></p>
                        @endif
                    </div>

                    <!-- Hidden -->
                    <div class="form-group">
                        <label for="is_hidden">Sembunyikan?</label>
                        <input type="checkbox" name="is_hidden" id="is_hidden" {{ isset($materi) && $materi->is_hidden ? 'checked' : '' }}>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection