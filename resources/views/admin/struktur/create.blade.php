@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="position-relative" style="max-width: 600px; margin: 0 auto;">
            <!-- Tulisan Tambah Bidang -->
            <h1 class="text-black font-bold mb-6" style="font-size: 30px;">
                <a href="{{ route('struktur.index') }}" class="text-gray-500">
                    <i class="fa-solid fa-arrow-left"></i>
                </a> Tambah Struktur Dewan Ambalan
            </h1>

            <!-- Kotak Form -->
            <div class="card shadow-sm text-black">
                <div class="card-body">
                    <form action="{{ route('struktur.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama_panjang">Nama Panjang</label>
                            <input type="text" name="nama_panjang" id="nama_panjang" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select class="form-control" id="jabatan" name="jabatan" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Pembina">Pembina</option>
                                <option value="Pradana Putra">Pradana Putra</option>
                                <option value="Pradana Putri">Pradana Putri</option>
                                <option value="Pemangku Adat Putra">Pemangku Adat Putra</option>
                                <option value="Pemangku Adat Putri">Pemangku Adat Putri</option>
                                <option value="Kerani Putra">Kerani Putra</option>
                                <option value="Kerani Putri">Kerani Putri</option>
                                <option value="Bendahara Putra">Bendahara Putra</option>
                                <option value="Bendahara Putri">Bendahara Putri</option>
                                <option value="Co GIAT">Co Bidang Giat</option>
                                <option value="Co HUMAS">Co Bidang Humas</option>
                                <option value="Co KESEKRETARIATAN">Co Bidang KESEKRETARIATAN</option>
                                <option value="Co PELATIHAN DAN PENGEMBANGAN">Co Bidang PELATIHAN DAN PENGEMBANGAN</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
