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
            <!-- Search Form -->
            <form action="{{ route('users.index') }}" method="GET" class="mb-4">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <input type="text" name="search" class="form-control" value="{{ request()->get('search') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
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
                            <th>Bidang</th>
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
                            <th>Bidang</th>
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
                                <td>{{ $user->member->angkatan ?? '-' }}</td>
                                <td>{{ $user->member->bidang->nama_bidang ?? '-' }}</td>
                                <td>
                                    <a href="" class="btn-success text-white py-1 px-3 rounded me-2">
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

                <!-- Custom Pagination -->
                <div class="d-flex justify-content-end mt-3">
                    <ul class="pagination">
                        <!-- Tombol Sebelumnya -->
                        @if ($users->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Sebelumnya</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev">Sebelumnya</a>
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
@endsection
