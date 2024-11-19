@extends('layouts.main')
@section('container')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Acara </h1>
    <p class="mb-4">Masukkan daftar Acara yang akan datang untuk mengetahui lebih detail</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Acara</h6>
            <a href="{{ route('admin.events.create') }}" class="btn-primary text-white py-2 px-2 rounded hover:bg-blue"><i
                    class="fa-solid fa-plus"></i>
                Tambah Acara
            </a>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: rgb(183, 0, 255);;">
                        <tr class="text-white">
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
                                        class="btn-primary text-white py-1 px-3 rounded me-2"><i
                                            class="fa-solid fa-circle-info"></i></a>

                                    @if (auth()->user()->role === 'admin')
                                        <a href="{{ route('admin.events.edit', $event) }}"
                                            class="btn-success text-white py-1 px-3 rounded me-2"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-danger text-white py-1 px-3 rounded"><i
                                                    class="fa-solid fa-trash"></i></button>
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
