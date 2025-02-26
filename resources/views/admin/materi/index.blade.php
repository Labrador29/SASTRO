@extends('layouts.main')
@section('container')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Materi
            <a href="{{ route('materi.create') }}" class="btn btn-primary py-2 px-2 rounded hover:bg-blue">
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
                        <th>Judul</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Judul</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    {{-- Contoh data kegiatan --}}
                    @forelse ($materi as $m)
                    <tr>
                        <td>{{ $m->judul }}</td>
                        <td><a href="{{ asset($m->file_path) }}" target="_blank">Unduh</a>
                        <td>{{ $m->is_hidden ? 'Hidden' : 'Displayed' }}</td>
                        <td>
                            <a href="{{ route('materi.edit', $m->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('materi.destroy', $m->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kegiatan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection