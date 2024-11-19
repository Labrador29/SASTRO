@extends('layouts.main')
@section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Acara </h1>
<p class="mb-4">Masukkan daftar Acara yang akan datang untuk mengethuai lebih detail</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Acara</h6>
    </div>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Acara</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Acara</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->event_date->format('d M Y H:i') }}</td>
                        <td> {{ $event->location }}</td>
                        <td><a href="{{ route('events.show', $event) }}"
                                class="text-blue-600 hover:text-blue-900 mr-3">Detail</a>

                            @if (auth()->user()->role === 'admin')
                            <a href="{{ route('admin.events.edit', $event) }}"
                                class="text-yellow-600 hover:text-yellow-900 mr-3">Edit</a>

                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900"
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
</div>
@endsection