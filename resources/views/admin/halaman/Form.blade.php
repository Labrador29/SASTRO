@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="position-relative" style="max-width: 600px; margin: 0 auto;">
            <!-- Kotak Form -->
            <div class="card shadow-sm text-black">
                <div class="card-body">
                    <!-- Tulisan Tambah/Edit Halaman -->
                    <div class="d-flex align-items-center justify-content-center position-relative mb-4">
                        <a href="{{ route('halaman.index') }}" class="text-gray-500 position-absolute start-0"
                            style="font-size: 25px;">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                        <h1 class="text-black font-bold m-0" style="font-size: 30px;">
                            {{ isset($halaman) ? 'Edit Halaman' : 'Tambah Halaman' }}
                        </h1>
                    </div>

                    <form action="{{ isset($halaman) ? route('halaman.update', $halaman) : route('halaman.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($halaman))
                            @method('PUT')
                        @endif

                        <!-- Bagian -->
                        <div class="form-group mb-3">
                            <label for="bagian" class="form-label">Bagian <span class="text-red-500">*</span></label>
                            <select name="bagian" id="bagian" class="form-control" required>
                                <option value="" disabled selected>Pilih bagian</option>
                                <option value="background"
                                    {{ old('bagian', $halaman->bagian ?? '') === 'background' ? 'selected' : '' }}>
                                    Background</option>
                                <option value="about"
                                    {{ old('bagian', $halaman->bagian ?? '') === 'about' ? 'selected' : '' }}>About</option>
                                <option value="pendaftaran"
                                    {{ old('bagian', $halaman->bagian ?? '') === 'pendaftaran' ? 'selected' : '' }}>
                                    Pendaftaran</option>
                            </select>
                        </div>

                        <!-- Foto -->
                        <div class="form-group mb-3">
                            <label for="foto">Foto <span class="text-red-500">*</span></label>
                            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                            @if (isset($halaman) && $halaman->foto)
                                <div class="mt-2">
                                    <img src="{{ asset('assets/halaman/' . $halaman->foto) }}" alt="{{ $halaman->halaman }}"
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
