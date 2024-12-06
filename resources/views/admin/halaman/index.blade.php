@extends('layouts.main')

@section('container')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Asset Home
                <a href="{{ route('halaman.create') }}" class="btn btn-primary py-2 px-2 rounded hover:bg-blue">
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
                            <th>Nama Asset</th>
                            <th>Bagian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Asset</th>
                            <th>Bagian</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($halaman as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if ($item->foto)
                                        <img src="{{ asset('assets/halaman/' . $item->foto) }}" alt="{{ $item->bagian }}"
                                            width="50">
                                    @else
                                        Tidak ada
                                    @endif
                                </td>
                                <td>{{ $item->bagian }}</td>
                                <td>
                                    <a href="{{ route('halaman.edit', $item) }}" class="btn btn-sm btn-success"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('halaman.destroy', $item) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus kegiatan ini?')"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data kegiatan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <div>
                    <p class="mb-0">Menampilkan {{ $halaman->firstItem() }} - {{ $halaman->lastItem() }} dari
                        {{ $halaman->total() }} data</p>
                </div>

                <div>
                    <ul class="pagination">
                        @if ($halaman->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Sebelumnya</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $halaman->previousPageUrl() }}" rel="prev">Sebelumnya</a>
                            </li>
                        @endif

                        @if ($halaman->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $halaman->nextPageUrl() }}" rel="next">Selanjutnya</a>
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

    <script>
        function resetSearch() {
            window.location.href =
                "{{ route('halaman.index') }}";
        }
    </script>
@endsection
