@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="position-relative" style="max-width: 600px; margin: 0 auto;">
        <!-- Tulisan Tambah Bidang -->
        <h1 class="text-black font-bold mb-6" style="font-size: 30px;">
            <a href="{{ route('kegiatan.index') }}" class="text-gray-500">
                <i class="fa-solid fa-arrow-left"></i>
            </a> {{ isset($kegiatan) ? 'Edit Kegiatan' : 'Create Kegiatan' }}
        </h1>

        <!-- Kotak Form -->
        <div class="card shadow-sm text-black">
            <div class="card-body">
                <form action="{{ isset($kegiatan) ? route('kegiatan.update', $kegiatan) : route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($kegiatan))
                    @method('PUT')
                    @endif

                    <!-- Nama Kegiatan -->
                    <div class="form-group mb-3">
                        <label for="nama">Nama Kegiatan</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $kegiatan->nama ?? '') }}" required>
                    </div>

                    <!-- Deskripsi Kegiatan -->
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi Kegiatan</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ old('deskripsi', $kegiatan->deskripsi ?? '') }}" required>
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', $kegiatan->tanggal ?? '') }}" required>
                    </div>

                    <!-- Jenis -->
                    <div class="form-group mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="" disabled selected>Pilih Jenis</option>
                            <option value="Operasional" {{ old('jenis', $kegiatan->jenis ?? '') === 'Operasional' ? 'selected' : '' }}>Operasional</option>
                            <option value="Partisipasi" {{ old('jenis', $kegiatan->jenis ?? '') === 'Partisipasi' ? 'selected' : '' }}>Partisipasi</option>
                        </select>
                    </div>

                    <!-- Foto -->
                    <div class="form-group mb-3">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                        @if(isset($kegiatan) && $kegiatan->foto)
                        <div class="mt-2">
                            <img src="{{ asset('assets/kegiatan/' . $kegiatan->foto) }}" alt="{{ $kegiatan->nama }}" width="100">
                            <p class="text-muted">Foto saat ini</p>
                        </div>
                        @endif
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