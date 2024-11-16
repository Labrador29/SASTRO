@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Daftar Acara</h1>
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('events.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Acara
        </a>
        @endif
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nama Acara
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tanggal
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Lokasi
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($events as $event)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $event->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $event->event_date->format('d M Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $event->location }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('events.show', $event) }}"
                            class="text-blue-600 hover:text-blue-900 mr-3">Detail</a>

                        @if(auth()->user()->role === 'admin')
                        <a href="{{ route('events.edit', $event) }}"
                            class="text-yellow-600 hover:text-yellow-900 mr-3">Edit</a>

                        <form action="{{ route('events.destroy', $event) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 hover:text-red-900"
                                onclick="return confirm('Yakin ingin menghapus acara ini?')">
                                Hapus
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection