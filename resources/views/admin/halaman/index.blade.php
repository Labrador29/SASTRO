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
                    {{-- Contoh data kegiatan --}}
                    @forelse ($halaman as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if ($item->foto)
                            <img src="{{ asset('assets/halaman/' . $item->foto) }}" alt="{{ $item->bagian }}" width="50">
                            @else
                            Tidak ada
                            @endif
                        </td>
                        <td>{{ $item->bagian }}</td>
                        <td>
                            <a href="{{ route('halaman.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('halaman.destroy', $item) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kegiatan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data kegiatan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection