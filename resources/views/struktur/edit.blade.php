@extends('layouts.main')

@section('container')
<div class="container">
    <h1>Edit struktur</h1>
    <form action="{{ route('struktur.update', $struktur->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_panjang">Nama Panjang</label>
            <input type="text" name="nama_panjang" id="nama_panjang" class="form-control" value="{{ $struktur->nama_panjang }}" required>
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select class="form-control" id="jabatan" name="jabatan" required>
                <option value="Pembina" {{ $struktur->Jabatan == 'Pembina' ? 'selected' : '' }}>Pembina</option>
                <option value="Pradana Putra" {{ $struktur->Jabatan == 'Pradana Putra' ? 'selected' : '' }}>Pradana Putra</option>
                <option value="Pradana Putri" {{ $struktur->Jabatan == 'Pradana Putri' ? 'selected' : '' }}>Pradana Putri</option>
                <option value="Pemangku Adat Putra" {{ $struktur->Jabatan == 'Pemangku Adat Putra' ? 'selected' : '' }}>Pemangku Adat Putra</option>
                <option value="Pemangku Adat Putri" {{ $struktur->Jabatan == 'Pemangku Adat Putri' ? 'selected' : '' }}>Pemangku Adat Putri</option>
                <option value="Kerani Putra" {{ $struktur->Jabatan == 'Kerani Putra' ? 'selected' : '' }}>Kerani Putra</option>
                <option value="Kerani Putri" {{ $struktur->Jabatan == 'Kerani Putri' ? 'selected' : '' }}>Kerani Putri</option>
                <option value="Bendahara Putra" {{ $struktur->Jabatan == 'Bendahara Putra' ? 'selected' : '' }}>Bendahara Putra</option>
                <option value="Bendahara Putri" {{ $struktur->Jabatan == 'Bendahara Putri' ? 'selected' : '' }}>Bendahara Putri</option>
                <option value="Co GIAT" {{ $struktur->Jabatan == 'Co GIAT' ? 'selected' : '' }}>Co Bidang Giat</option>
                <option value="Co HUMAS" {{ $struktur->Jabatan == 'Co HUMAS' ? 'selected' : '' }}>Co Bidang Humas</option>
                <option value="Co KESEKRETARIATAN" {{ $struktur->Jabatan == 'Co KESEKRETARIATAN' ? 'selected' : '' }}>Co Bidang KESEKRETARIATAN</option>
                <option value="Co PELATIHAN DAN PENGEMBANGAN" {{ $struktur->Jabatan == 'Co PELATIHAN DAN PENGEMBANGAN' ? 'selected' : '' }}>Co Bidang PELATIHAN DAN PENGEMBANGAN</option>
            </select>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
            @if($struktur->foto)
            <img src="{{ asset($struktur->foto) }}" alt="Foto" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection