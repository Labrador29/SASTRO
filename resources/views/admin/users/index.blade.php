@extends('layouts.main')

@section('container')
    <h1 class="h3 mb-2 text-gray-800">Daftar Users</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
            <a href="{{ route('admin.mass.register.form') }}"
                class="btn-primary text-white py-2 px-3 rounded hover:bg-blue"><i class="fa-solid fa-plus"></i>
                Tambah User
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
                    <thead style="background-color: rgb(183, 0, 255);">
                        <tr class="text-white">
                            <th class="py-2 px-4 border-b text-left">No</th>
                            <th class="py-2 px-4 border-b text-left">Nama</th>
                            <th class="py-2 px-4 border-b text-left">Email</th>
                            <th class="py-2 px-4 border-b text-left">Role</th>
                            <th class="py-2 px-4 border-b text-left">Angkatan</th>
                            <th class="py-2 px-4 border-b text-left">Bidang</th>
                            <th class="py-2 px-4 border-b text-left">QR Code</th>
                            <th class="py-2 px-4 border-b text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                <td class="py-2 px-4 border-b">
                                    <span
                                        class="px-3 py-1 text-white rounded {{ $user->role == 'admin'
                                            ? 'bg-warning'
                                            : ($user->role == 'pengurus_aktif'
                                                ? 'bg-success'
                                                : ($user->role == 'alumni'
                                                    ? 'bg-purple-600'
                                                    : ($user->role == 'pembina'
                                                        ? 'bg-primary'
                                                        : ''))) }}">
                                        {{ $user->role == 'pengurus_aktif' ? 'Pengurus' : ucfirst(str_replace('_', ' ', $user->role)) }}
                                    </span>
                                </td>
                                <td class="py-2 px-4 border-b">{{ $user->member->angkatan ?? '-' }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->member->bidang->nama_bidang ?? '-' }}</td>
                                <td class="py-2 px-4 border-b">
                                    @if ($user->qr_code)
                                        {!! QrCode::size(100)->generate($user->qr_code) !!}
                                    @else
                                        <span>QR Code belum dihasilkan</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b">
                                    <div class="d-flex align-items-center">
                                        <a href=""
                                            class="btn-success text-white py-1 px-3 rounded me-2 d-inline-flex justify-content-center align-items-center">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="" method="POST" class="d-inline-flex">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn-danger text-white py-1 px-3 rounded d-inline-flex justify-content-center align-items-center">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
