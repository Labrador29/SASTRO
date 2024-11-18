@extends('layouts.app')

@section('content')
<div class="container max-w-6xl mx-auto px-4">
    <h1 class="my-4 text-2xl font-semibold">List Users</h1>

    @if(session('success'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex justify-between mb-4">
        <a href="{{ route('admin.mass.register.form') }}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Tambah User</a>
    </div>

    <table class="min-w-full table-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border-b text-left">#</th>
                <th class="py-2 px-4 border-b text-left">Nama</th>
                <th class="py-2 px-4 border-b text-left">Email</th>
                <th class="py-2 px-4 border-b text-left">Role</th>
                <th class="py-2 px-4 border-b text-left">Angkatan</th>
                <th class="py-2 px-4 border-b text-left">Bidang</th>
                <th class="py-2 px-4 border-b text-left">Instagram</th>
                <th class="py-2 px-4 border-b text-left">Facebook</th>
                <th class="py-2 px-4 border-b text-left">X</th>
                <th class="py-2 px-4 border-b text-left">QR Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                <td class="py-2 px-4 border-b">{{ ucfirst($user->role) }}</td>
                <td class="py-2 px-4 border-b">{{ $user->member->angkatan ?? '-' }}</td>
                <td class="py-2 px-4 border-b">{{ $user->member->bidang->nama_bidang ?? '-' }}</td>
                <td class="py-2 px-4 border-b">{{ $user->member->instagram ?? '-' }}</td>
                <td class="py-2 px-4 border-b">{{ $user->member->facebook ?? '-' }}</td>
                <td class="py-2 px-4 border-b">{{ $user->member->x ?? '-' }}</td>
                <td class="py-2 px-4 border-b">
                    @if ($user->qr_code)
                    {!! QrCode::size(100)->generate($user->qr_code) !!}
                    @else
                    <span>QR Code belum dihasilkan</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection