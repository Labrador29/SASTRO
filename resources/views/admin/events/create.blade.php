@extends('layouts.main')

@section('container')
    <div class="container mx-auto px-4 py-8">
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto">

            <form action="{{ route('admin.events.store') }}" method="POST"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="flex items-center justify-between mb-6">
                    <a href="{{ route('events.index') }}" class="text-gray-500 text-2xl">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>

                    <h1 class="text-black font-bold" style="font-size: 30px; text-align: center; flex-grow: 1;">
                        Tambah Acara
                    </h1>
                </div>
                @csrf
                <div class="mb-4">
                    <label class="block text-black text-sm font-bold mb-2" for="name">
                        Nama Acara <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-black text-sm font-bold mb-2" for="description">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea name="description" id="description" rows="4"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                        required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-black text-sm font-bold mb-2" for="event_date">
                        Tanggal dan Waktu <span class="text-red-500">*</span>
                    </label>
                    <input type="datetime-local" name="event_date" id="event_date" value="{{ old('event_date') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-2" for="location">
                        Lokasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="location" id="location" value="{{ old('location') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                        required>
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
@endsection
