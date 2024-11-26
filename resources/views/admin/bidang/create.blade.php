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
    </style>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="container max-w-6xl mx-auto px-4">
                <h1 class="text-black font-bold mb-6" style="font-size: 25px;">
                    <a href="{{ route('bidang.index') }}" class="text-gray-500">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a> Tambah Bidang
                </h1>
                <hr>
                <br>
                <form action="{{ route('bidang.store') }}" method="POST" enctype="multipart/form-data"
                    class="form-container">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_bidang" class="block text-sm font-medium">Nama Bidang <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_bidang"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-sm font-medium">Deskripsi <span
                                class="text-red-500">*</span></label>
                        <textarea name="deskripsi"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                            required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="gambar" class="form-label">Upload Foto <span class="text-red-500">*</span></label>
                        <input type="file" name="gambar" id="gambar"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                            accept="image/*">
                    </div>
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
