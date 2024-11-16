@extends('layouts.app')

@section('content')
<div class="container max-w-6xl mx-auto px-4">
    <h1 class="my-4 text-2xl font-semibold">Tambah Bidang</h1>

    <form action="{{ route('bidang.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_bidang" class="block text-sm font-medium text-gray-700">Nama Bidang</label>
            <input type="text" name="nama_bidang" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" class="form-textarea mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
        </div>
        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Simpan</button>
    </form>
</div>
@endsection