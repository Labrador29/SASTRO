@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="position-relative" style="max-width: 600px; margin: 0 auto;">
        <!-- Kotak Form -->
        <div class="card shadow-sm text-black">
            <div class="card-body">
                <!-- Tulisan Tambah/Edit proposal -->
                <div class="d-flex align-items-center justify-content-center position-relative mb-4">
                    <a href="{{ route('proposal.index') }}" class="text-gray-500 position-absolute start-0"
                        style="font-size: 25px;">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h1 class="text-black font-bold m-0" style="font-size: 30px;">
                        {{ isset($proposal) ? 'Edit Arsip Proposal' : 'Tambah Arsip Proposal' }}
                    </h1>
                </div>

                <form action="{{ isset($proposal) ? route('proposal.update', $proposal) : route('proposal.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($proposal))
                    @method('PUT')
                    @endif

                    <!-- Nama -->
                    <div class="form-group mb-3">
                        <label for="nama">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan', $proposal->nama_kegiatan ?? '') }}" required>
                    </div>

                    <!-- Bagian -->
                    <div class="form-group mb-3">
                        <label for="bagian" class="form-label">Jenis Proposal<span class="text-red-500">*</span></label>
                        <select name="bagian" id="bagian" class="form-control" required>
                            <option value="" disabled selected>Pilih bagian</option>
                            <option value="kegiatan"
                                {{ old('bagian', $proposal->bagian ?? '') === 'kegiatan' ? 'selected' : '' }}>
                                Kegiatan</option>
                            <option value="pengadaan"
                                {{ old('bagian', $proposal->bagian ?? '') === 'pengadaan' ? 'selected' : '' }}>Pengadaan</option>
                            <option value="sponsor"
                                {{ old('bagian', $proposal->bagian ?? '') === 'sponsor' ? 'selected' : '' }}>
                                Sponsorship</option>
                            <option value="program"
                                {{ old('bagian', $proposal->bagian ?? '') === 'program' ? 'selected' : '' }}>
                                Program</option>
                            <option value="event"
                                {{ old('bagian', $proposal->bagian ?? '') === 'event' ? 'selected' : '' }}>
                                Event</option>
                        </select>
                    </div>

                    <!-- File PDF -->
                    <div class="form-group mb-3">
                        <label for="pdf">File PDF <span class="text-red-500">*</span></label>
                        <input type="file" name="mentahan" id="mentahan" class="form-control" accept="application/pdf">
                        @if (isset($proposal) && $proposal->pdf)
                        <div class="mt-2">
                            <!-- Menampilkan PDF jika sudah ada -->
                            <iframe src="{{ asset('assets/proposal/' . $proposal->pdf) }}" width="100%" height="400px" frameborder="0"></iframe>
                            <p class="text-muted">File PDF saat ini</p>
                        </div>
                        @endif
                    </div>


                    <div class="d-flex justify-content-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection