@extends('layouts.main')
@section('container')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Acara
                <a href="{{ route('admin.events.create') }}" class="btn btn-primary py-2 px-2 rounded hover:bg-blue">
                    <i class="fa-solid fa-plus"></i> Tambah
                </a>
            </h6>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <form action="" method="GET" class="mb-4">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <input type="text" name="search" class="form-control" value="{{ request()->get('search') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
                    </div>
                </div>
            </form>
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

                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <p class="mb-0">Menampilkan {{ $events->firstItem() }} - {{ $events->lastItem() }} dari
                            {{ $events->total() }} data</p>
                    </div>

                    <div>
                        <ul class="pagination">
                            <!-- Tombol Sebelumnya -->
                            @if ($events->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Sebelumnya</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $events->previousPageUrl() }}"
                                        rel="prev">Sebelumnya</a>
                                </li>
                            @endif

                            <!-- Tombol Selanjutnya -->
                            @if ($events->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $events->nextPageUrl() }}" rel="next">Selanjutnya</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Selanjutnya</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
