@extends('layouts.main')

@section('container')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar User
            <a href="{{ route('admin.mass.register.form') }}" class="btn btn-primary py-2 px-2 rounded hover:bg-blue">
                <i class="fa-solid fa-plus"></i> Tambah
            </a>
        </h6>
    </div>

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

        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="background-color: rgb(183, 0, 255);">
                    <tr class="text-white">
                        <th>ID</th>
                        <th>Nama Panjang</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Angkatan</th>
                        <th>QR</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nama Panjang</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Angkatan</th>
                        <th>QR</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span
                                class="px-3 py-1 text-white rounded {{ $user->role == 'admin' ? 'bg-warning' : ($user->role == 'pengurus_aktif' ? 'bg-success' : ($user->role == 'alumni' ? 'bg-purple-600' : 'bg-primary')) }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>{{ $user->angkatan ?? '-' }}</td>
                        <td>{!! QrCode::size(200)->generate($user->id) !!}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn-success text-white py-1 px-3 rounded me-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form action="" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger text-white py-1 px-3 rounded">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-3">
                <div>
                    <p class="mb-0">Menampilkan {{ $users->firstItem() }} - {{ $users->lastItem() }} dari
                        {{ $users->total() }} data
                    </p>
                </div>

                <div>
                    <ul class="pagination">
                        <!-- Tombol Sebelumnya -->
                        @if ($users->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Sebelumnya</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->previousPageUrl() }}"
                                rel="prev">Sebelumnya</a>
                        </li>
                        @endif

                        <!-- Tombol Selanjutnya -->
                        @if ($users->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next">Selanjutnya</a>
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
            "{{ route('users.index') }}";
    }
</script>
@endsection