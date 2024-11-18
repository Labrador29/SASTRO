@extends('layouts.app')

@section('content')
<h1>Daftar Kategori</h1>
<a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->deskripsi }}</td>
            <td>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection