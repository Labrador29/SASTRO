@extends('layouts.main')
@section('container')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Program Kerja
                <a href="{{ route('proker.create') }}" class="btn btn-primary py-2 px-2 rounded hover:bg-blue">
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
            <form action="" method="GET" class="mb-4" id="searchForm">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <input type="text" name="search" class="form-control" value="{{ request()->get('search') }}">
                    </div>
                    <div class="col-md-3 d-flex">
                        @if (request()->get('search'))
                            <button type="button" id="resetBtn" class="btn btn-danger w-50 mr-2"
                                onclick="resetSearch()"><i class="fa-solid fa-x"></i></button>
                        @endif
                        <button type="submit" id="searchBtn"
                            class="btn btn-primary w-100 {{ request()->get('search') ? 'w-50' : '' }}">Cari</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: rgb(183, 0, 255);;">
                        <tr class="text-white">
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($prokers as $proker)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $proker->nama }}</td>
                                <td>{{ $proker->Tanggal }}</td>
                                <td>{{ $proker->lokasi }}</td>
                                <td>{{ $proker->status }}</td>
                                <td>
                                    <a href="{{ route('proker.edit', $proker) }}" class="btn btn-success"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('proker.destroy', $proker) }}" method="POST"
                                        style="display:inline-block;">
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

                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <p class="mb-0">Menampilkan {{ $prokers->firstItem() }} - {{ $prokers->lastItem() }} dari
                            {{ $prokers->total() }} data</p>
                    </div>

                    <div>
                        <ul class="pagination">
                            <!-- Tombol Sebelumnya -->
                            @if ($prokers->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Sebelumnya</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $prokers->previousPageUrl() }}"
                                        rel="prev">Sebelumnya</a>
                                </li>
                            @endif

                            <!-- Tombol Selanjutnya -->
                            @if ($prokers->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $prokers->nextPageUrl() }}"
                                        rel="next">Selanjutnya</a>
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

    <script>
        function resetSearch() {
            window.location.href =
                "{{ route('proker.index') }}";
        }
    </script>
@endsection
