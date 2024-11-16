@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Dashboard Alumni</h1>

    <!-- QR Code -->
    <div class="bg-white rounded-lg shadow mb-8 p-6">
        <h2 class="text-xl font-bold mb-4">QR Code Anda</h2>
        <div class="flex justify-center mb-4">
            {!! QrCode::size(200)->generate(auth()->user()->qr_code) !!}
        </div>
        <p class="text-center text-gray-600">Tunjukkan QR Code ini saat absensi acara</p>
    </div>

    <!-- Acara Mendatang -->
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-4">Acara Mendatang</h2>
            <div class="space-y-4">
                @foreach($upcomingEvents as $event)
                <div class="border-b pb-4 last:border-0 last:pb-0">
                    <h3 class="font-bold">{{ $event->name }}</h3>
                    <p class="text-gray-600">{{ $event->event_date->format('d M Y H:i') }}</p>
                    <p class="text-gray-500">{{ $event->location }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Riwayat Kehadiran -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-4">Riwayat Kehadiran</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acara</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Absen</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($myAttendances as $attendance)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->event->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->event->event_date->format('d M Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->check_in_time->format('H:i:s') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection