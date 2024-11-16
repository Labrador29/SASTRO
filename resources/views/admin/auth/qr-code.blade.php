@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-2xl font-bold mb-6 text-center">QR Code Anda</h2>

        <div class="flex justify-center mb-4">
            {!! $qrCode !!}
        </div>

        <div class="text-center mb-4">
            <p class="text-gray-600">Nama: {{ $user->name }}</p>
            <p class="text-gray-600">Email: {{ $user->email }}</p>
        </div>

        <div class="text-center text-sm text-gray-500">
            <p>Simpan QR Code ini untuk melakukan absensi pada setiap acara</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('dashboard') }}"
                class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
                Lanjut ke Dashboard
            </a>
        </div>
    </div>
</div>
@endsection