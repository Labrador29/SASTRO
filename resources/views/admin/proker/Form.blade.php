@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="position-relative" style="max-width: 600px; margin: 0 auto;">
            <!-- Tulisan Tambah Bidang -->
            <h1 class="text-black font-bold mb-6" style="font-size: 30px;">
                <a href="{{ route('proker.index') }}" class="text-gray-500">
                    <i class="fa-solid fa-arrow-left"></i>
                </a> {{ isset($proker) ? 'Edit Proker' : 'Tambah Proker' }}
            </h1>

            <!-- Kotak Form -->
            <div class="card shadow-sm text-black">
                <div class="card-body">
                    <form action="{{ isset($proker) ? route('proker.update', $proker) : route('proker.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($proker))
                            @method('PUT')
                        @endif
                        <div class="form-group mb-3">
                            <label for="nama">Nama Program</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ old('nama', $proker->nama ?? '') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="lokasi">lokasi Program</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control"
                                value="{{ old('lokasi', $proker->lokasi ?? '') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                @foreach (['Terlaksana', 'Proses', 'Tidak Terlaksana'] as $status)
                                    <option value="{{ $status }}"
                                        {{ old('status', $proker->status ?? '') === $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Tahun -->
                        <div class="form-group mb-3">
                            <label for="Tanggal">Tanggal</label>
                            <input type="date" name="Tanggal" id="Tanggal" class="form-control"
                                value="{{ old('Tanggal', $proker->Tanggal ?? '') }}" required>
                        </div>
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
