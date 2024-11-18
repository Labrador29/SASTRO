@extends('layouts.app')

@section('content')
<h1>Daftar Berita</h1>
<a href="{{ route('news.create') }}" class="btn btn-primary">Tambah Berita</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Tanggal</th>
            <th>foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($news as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->category->name ?? '-' }}</td>
            <td>{{ $item->tanggal_berita }}</td>
            <td>
                @if($item->foto)
                <img src="{{ Storage::url($item->foto) }}" alt="Foto Berita" width="100">
                @endif
            </td>
            <td>
                <a href="{{ route('news.edit', $item) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('news.destroy', $item) }}" method="POST" style="display:inline-block;">
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