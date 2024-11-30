@extends('layouts.main')
@section('container')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Struktur Organisasi </h1>
    <p class="mb-4">Masukkan Struktur Organisasi Terbaru untuk mengetahui lebih detail</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Struktur</h6>
            <a href="{{ route('struktur.create') }}" class="btn-primary text-white py-2 px-2 rounded hover:bg-blue"><i
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
                            <th>ID</th>
                            <th>Nama Panjang</th>
                            <th>Jabatan</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nama Panjang</th>
                            <th>Jabatan</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($strukturs as $struktur)
                            <tr>
                                <td>{{ $loop->iteration + ($strukturs->currentPage() - 1) * $strukturs->perPage() }}</td>
                                <td>{{ $struktur->nama_panjang }}</td>
                                <td>{{ $struktur->Jabatan }}</td>
                                <td>
                                    @if ($struktur->foto)
                                        <img src="{{ asset($struktur->foto) }}" alt="Foto" width="50">
                                    @else
                                        Tidak Ada
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('struktur.edit', $struktur->id) }}"
                                        class="btn-success text-white py-1 px-3 rounded me-2"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    <form action="{{ route('struktur.destroy', $struktur->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger text-white py-1 px-3 rounded"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Custom Pagination -->
                <div class="d-flex justify-content-end mt-3">
                    <ul class="pagination">
                        <!-- Tombol Sebelumnya -->
                        @if ($strukturs->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Sebelumnya</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $strukturs->previousPageUrl() }}"
                                    rel="prev">Sebelumnya</a>
                            </li>
                        @endif

                        <!-- Tombol Selanjutnya -->
                        @if ($strukturs->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $strukturs->nextPageUrl() }}" rel="next">Selanjutnya</a>
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
@endsection
