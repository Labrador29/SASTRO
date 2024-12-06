@extends('layouts.main')

@section('container')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Detail Acara -->
            <div class="p-6">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex items-center">
                        <a href="{{ route('events.index') }}" class="text-gray-500 hover:text-gray-700 mr-3">
                            <i class="fa-solid fa-arrow-left text-2xl"></i>
                        </a>
                        <h1 class="text-3xl font-bold">Detail Acara : {{ $event->name }}</h1>
                    </div>
                    @if (auth()->user()->role === 'admin')
                        <div class="space-x-2">
                            <a href="{{ route('admin.events.edit', $event) }}"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    onclick="return confirm('Yakin ingin menghapus acara ini?')">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mb-4">
                    <div>
                        <h3 class="text-lg font-semibold mb-1">Deskripsi</h3>
                        <p class="text-gray-600">{{ $event->description }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-1">Lokasi</h3>
                        <p class="text-gray-600">{{ $event->location }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-1">Tanggal & Waktu</h3>
                        <p class="text-gray-600">{{ $event->event_date->format('d M Y H:i') }}</p>
                    </div>
                </div>

            </div>

            <!-- Daftar Kehadiran -->
            <div class="border-t">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Daftar Kehadiran</h2>
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('events.scan', ['event' => $event->id]) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                            <i class="fa-solid fa-qrcode"></i> Scan QR Code
                        </a>
                    @endif

                    <div class="overflow-x-auto mt-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No</th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama</th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Waktu Hadir</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($attendances as $index => $attendance)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attendance->check_in_time->format('d M Y H:i:s') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada yang hadir
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
