@extends('layouts.app')

@section('content')
<div class="container max-w-6xl mx-auto px-4">
    <h1 class="my-4 text-2xl font-semibold">List Bidang</h1>

    @if(session('success'))
    <div class="alert alert-success bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('bidang.create') }}" class="btn bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mb-3 inline-block">Tambah Bidang</a>

    <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border-b">#</th>
                <th class="py-2 px-4 border-b">Nama Bidang</th>
                <th class="py-2 px-4 border-b">Deskripsi</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bidang as $bidang)
            <tr>
                <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                <td class="py-2 px-4 border-b">{{ $bidang->nama_bidang }}</td>
                <td class="py-2 px-4 border-b">{{ $bidang->deskripsi }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('bidang.edit', $bidang) }}" class="btn bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('bidang.destroy', $bidang) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
