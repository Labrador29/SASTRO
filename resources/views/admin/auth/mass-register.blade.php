@extends('layouts.main')

@section('container')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg relative">
        <!-- Arrow Icon positioned at the top left corner -->

        <a href="{{ route('users.index') }}" class="text-gray-500">
            <i class="fa-solid fa-arrow-left absolute top-0 left-0 mt-4 ml-4 text-black text-xl cursor-pointer"></i>
        </a>

        <h2 class="text-black font-semibold text-center mb-4" style="font-size: 30px;">
            Input Users
        </h2>

        <!-- Menampilkan pesan sukses atau error -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form untuk mengunggah file Excel -->
        <form action="{{ route('admin.mass.register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="excel_file" class="block text-sm font-medium text-gray-700">Pilih File Excel <span
                        class="text-red-500">*</span></label>
                <input type="file" name="excel_file" id="excel_file" accept=".xlsx, .xls, .csv" required
                    class="mt-2 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit"
                class="w-full py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Unggah File
            </button>
        </form>
    </div>
@endsection
