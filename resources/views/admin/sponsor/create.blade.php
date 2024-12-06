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
            max-width: 600px;
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
                    <a href="{{ route('sponsor.index') }}" class="text-gray-500">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a> Tambah Sponsor
                </h1>
                <form action="{{ route('sponsor.store') }}" method="POST" enctype="multipart/form-data"
                    class="form-container">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium">Nama Perusahaan <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan Nama Perusahaan" required>
                    </div>
                    <div class="mb-4">
                        <label for="logo" class="block text-sm font-medium">Upload Logo Perusahaan <span
                                class="text-red-500">*</span></label>
                        <input type="file" name="logo" id="logo"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                            accept="image/*" required>
                    </div>
                    <div class="mb-4">
                        <label for="tanggal" class="block text-sm font-medium">Tanggal Sponsor<span
                                class="text-red-500">*</span></label>
                        <input type="date" name="tanggal"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                    <button type="submit" class="btn-primary text-white py-2 px-4 rounded ">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
