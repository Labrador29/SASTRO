@extends('layouts.main')

@section('container')
    <div class="container mt-1 mb-4">
        <div class="position-relative" style="max-width: 600px; margin: 0 auto;">
            <!-- Kotak Form -->
            <div class="card shadow-sm text-black">
                <div class="card-body">
                    <!-- Tulisan Tambah/Edit Halaman -->
                    <div class="d-flex align-items-center justify-content-center position-relative mb-4">
                        <a href="{{ route('kegiatan.index') }}" class="text-gray-500 position-absolute start-0"
                            style="font-size: 25px;">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                        <h1 class="text-black font-bold m-0" style="font-size: 30px;">
                            {{ isset($kegiatan) ? 'Edit Kegiatan' : 'Tambah Kegiatan' }}
                        </h1>
                    </div>
                    <form action="{{ isset($kegiatan) ? route('kegiatan.update', $kegiatan) : route('kegiatan.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($kegiatan))
                            @method('PUT')
                        @endif

                        <!-- Nama Kegiatan -->
                        <div class="form-group mb-3">
                            <label for="nama">Nama Kegiatan <span class="text-red-500">*</span></label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ old('nama', $kegiatan->nama ?? '') }}" required>
                        </div>

                        <!-- Deskripsi Kegiatan -->
                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi Kegiatan <span class="text-red-500">*</span></label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                                value="{{ old('deskripsi', $kegiatan->deskripsi ?? '') }}" required>
                        </div>

                        <!-- Tanggal -->
                        <div class="form-group mb-3">
                            <label for="tanggal">Tanggal <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{ old('tanggal', $kegiatan->tanggal ?? '') }}" required>
                        </div>

                        <!-- Jenis -->
                        <div class="form-group mb-3">
                            <label for="jenis" class="form-label">Jenis <span class="text-red-500">*</span></label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option value="" disabled selected>Pilih Jenis</option>
                                <option value="Operasional"
                                    {{ old('jenis', $kegiatan->jenis ?? '') === 'Operasional' ? 'selected' : '' }}>
                                    Operasional</option>
                                <option value="Partisipasi"
                                    {{ old('jenis', $kegiatan->jenis ?? '') === 'Partisipasi' ? 'selected' : '' }}>
                                    Partisipasi</option>
                            </select>
                        </div>

                        <!-- Foto -->
                        <div class="form-group mb-3">
                            <label for="foto">Foto <span class="text-red-500">*</span></label>
                            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                            @if (isset($kegiatan) && $kegiatan->foto)
                                <div class="mt-2">
                                    <img src="{{ asset('assets/kegiatan/' . $kegiatan->foto) }}" alt="{{ $kegiatan->nama }}"
                                        width="100">
                                    <p class="text-muted">Foto saat ini</p>
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end">
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
