@extends('layouts.main')

@section('container')
    <style>
        .custom-shadow {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
    <div class="container">
        <h1 class="text-black font-bold mb-6" style="font-size: 30px;">
            <a href="{{ route('struktur.index') }}" class="text-gray-500">
                <i class="fa-solid fa-arrow-left"></i>
            </a> Edit Struktur Dewan Ambalan
        </h1>
        <div class="card custom-shadow mb-4 text-black">
            <div class="card-body">
                <form action="{{ route('struktur.update', $struktur->id) }}" method="POST" enctype="multipart/form-data"
                    id="edit-struktur-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_panjang">Nama Panjang</label>
                        <input type="text" name="nama_panjang" id="nama_panjang" class="form-control"
                            value="{{ $struktur->nama_panjang }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan" required>
                            <option value="Pembina" {{ $struktur->Jabatan == 'Pembina' ? 'selected' : '' }}>Pembina</option>
                            <option value="Pradana Putra" {{ $struktur->Jabatan == 'Pradana Putra' ? 'selected' : '' }}>
                                Pradana Putra</option>
                            <option value="Pradana Putri" {{ $struktur->Jabatan == 'Pradana Putri' ? 'selected' : '' }}>
                                Pradana Putri</option>
                            <option value="Pemangku Adat Putra"
                                {{ $struktur->Jabatan == 'Pemangku Adat Putra' ? 'selected' : '' }}>Pemangku Adat Putra
                            </option>
                            <option value="Pemangku Adat Putri"
                                {{ $struktur->Jabatan == 'Pemangku Adat Putri' ? 'selected' : '' }}>Pemangku Adat Putri
                            </option>
                            <option value="Kerani Putra" {{ $struktur->Jabatan == 'Kerani Putra' ? 'selected' : '' }}>Kerani
                                Putra</option>
                            <option value="Kerani Putri" {{ $struktur->Jabatan == 'Kerani Putri' ? 'selected' : '' }}>Kerani
                                Putri</option>
                            <option value="Bendahara Putra"
                                {{ $struktur->Jabatan == 'Bendahara Putra' ? 'selected' : '' }}>
                                Bendahara Putra</option>
                            <option value="Bendahara Putri"
                                {{ $struktur->Jabatan == 'Bendahara Putri' ? 'selected' : '' }}>Bendahara Putri</option>
                            <option value="Co GIAT" {{ $struktur->Jabatan == 'Co GIAT' ? 'selected' : '' }}>Co Bidang Giat
                            </option>
                            <option value="Co HUMAS" {{ $struktur->Jabatan == 'Co HUMAS' ? 'selected' : '' }}>Co Bidang
                                Humas</option>
                            <option value="Co KESEKRETARIATAN"
                                {{ $struktur->Jabatan == 'Co KESEKRETARIATAN' ? 'selected' : '' }}>Co Bidang
                                KESEKRETARIATAN</option>
                            <option value="Co PELATIHAN DAN PENGEMBANGAN"
                                {{ $struktur->Jabatan == 'Co PELATIHAN DAN PENGEMBANGAN' ? 'selected' : '' }}>Co Bidang
                                PELATIHAN DAN PENGEMBANGAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="NTA">NTA</label>
                        <input type="number" name="NTA" id="NTA" class="form-control"
                            value="{{ $struktur->NTA }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="number" name="tahun" id="tahun" class="form-control"
                            placeholder="Masukkan Tahun (4 digit, misal 2024)" min="2000" max="{{ date('Y') }}"
                            value="{{ $struktur->tahun }}" required>
                    </div>

                    <!-- Dropzone for Foto -->
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <div id="foto" class="dropzone">
                            <input type="file" name="foto" id="foto-input" />
                        </div>
                        @if ($struktur->foto)
                            <img src="{{ asset($struktur->foto) }}" alt="Foto" width="100">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.foto = {
            url: "{{ route('struktur.update', $struktur->id) }}", // Update the form action URL for Dropzone
            paramName: "foto", // The name of the file input
            maxFilesize: 2, // Max file size in MB
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            dictDefaultMessage: "Drag and drop a photo here or click to upload",
            init: function() {
                @if ($struktur->foto)
                    this.on("success", function(file, response) {
                        // Add the uploaded photo URL to the hidden input field or handle as needed
                    });
                @endif
            }
        };
    </script>
@endsection
