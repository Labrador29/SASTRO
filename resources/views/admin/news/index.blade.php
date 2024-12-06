@extends('layouts.main')

@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Berita
                <a href="{{ route('news.create') }}" class="btn btn-primary py-2 px-2 rounded hover:bg-blue">
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
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($news as $item)
                            <tr>
                                <td>{{ $loop->iteration + ($news->currentPage() - 1) * $news->perPage() }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->category->name ?? '-' }}</td>
                                <td>{{ $item->tanggal_berita }}</td>
                                <td>
                                    @if ($item->foto)
                                        <img src="{{ Storage::url($item->foto) }}" alt="Foto Berita" width="100">
                                    @endif
                                </td>
                                <td>
                                    @if (auth()->user()->role === 'admin')
                                        <a href="{{ route('news.edit', $item) }}"
                                            class="btn-success text-white py-1 px-3 rounded me-2"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        <form action="{{ route('news.destroy', $item) }}" method="POST"
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
                        <p class="mb-0">Menampilkan {{ $news->firstItem() }} - {{ $news->lastItem() }} dari
                            {{ $news->total() }} data</p>
                    </div>

                    <div>
                        <ul class="pagination">
                            @if ($news->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Sebelumnya</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $news->previousPageUrl() }}"
                                        rel="prev">Sebelumnya</a>
                                </li>
                            @endif

                            @if ($news->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $news->nextPageUrl() }}" rel="next">Selanjutnya</a>
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
