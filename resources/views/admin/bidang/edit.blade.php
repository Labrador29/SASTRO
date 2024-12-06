@extends('layouts.main')

@section('container')
    <div class="container max-w-6xl mx-auto px-4 text-black">
        <!-- Card container with flexbox for centering the heading -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <!-- Left Arrow Icon -->
                    <a href="{{ route('bidang.index') }}" class="text-gray-500 text-2xl">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>

                    <!-- Centered Title -->
                    <h1 class="text-black font-bold m-0" style="font-size: 25px; text-align: center; flex-grow: 1;">
                        Edit Bidang
                    </h1>
                </div>
                <form action="{{ route('bidang.update', $bidang) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_bidang" class="form-label">Nama Bidang <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_bidang" id="nama_bidang" class="form-control"
                            value="{{ $bidang->nama_bidang }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $bidang->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Foto Baru <span
                                class="text-red-500">*</span></label>
                        <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                        <small class="text-secondary">Kosongkan jika tidak ingin mengganti gambar.</small>
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
@endsection
