@extends('layouts.main')

@section('container')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Arsip Proposal
            <a href="{{ route('proposal.create') }}" class="btn btn-primary py-2 px-2 rounded hover:bg-blue">
                <i class="fa-solid fa-plus"></i> Tambah
            </a>
        </h6>
    </div>

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
    @endif
    @if (session('info'))
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4">
        {{ session('info') }}
    </div>
    @endif


    <div class="card-body">
        <form action="" method="GET" class="mb-4" id="searchForm">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <input type="text" name="search" class="form-control" value="{{ request()->get('search') }}">
                </div>
                <div class="col-md-3 d-flex">
                    @if (request()->get('search'))
                    <button type="button" id="resetBtn" class="btn btn-danger w-50 mr-2"
                        onclick="resetSearch()"><i class="fa-solid fa-x"></i></button>
                    @endif
                    <button type="submit" id="searchBtn"
                        class="btn btn-primary w-100 {{ request()->get('search') ? 'w-50' : '' }}">Cari</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="background-color: rgb(183, 0, 255);;">
                    <tr class="text-white">
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Jenis Proposal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Jenis Proposal</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($proposals as $proposal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $proposal->nama_kegiatan }}</td>
                        <td>{{ ucfirst($proposal->bagian) }}</td>
                        <td>
                            <!-- Melihat/Mengunduh File PDF -->
                            @if ($proposal->mentahan)
                            <a href="{{ asset($proposal->mentahan) }}" target="_blank" class="btn btn-primary">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            @endif

                            <!-- Upload TTD -->
                            @if (is_null($proposal->ttd))
                            <button type="button" class="btn btn-warning btn-sm" title="Unggah TTD" data-bs-toggle="modal" data-bs-target="#uploadTtdModal-{{ $proposal->id }}">
                                <i class="fa fa-upload"></i>
                            </button>
                            @else
                            <a href="{{ route('proposal.download', ['type' => 'ttd', 'proposal' => $proposal]) }}" class="btn btn-success btn-sm" title="Lihat/Mengunduh TTD">
                                <i class="fa fa-file"></i>
                            </a>
                            @endif

                            <!-- Edit Proposal -->
                            <a href="{{ route('proposal.edit', $proposal) }}" class="btn btn-secondary btn-sm" title="Edit Proposal">
                                <i class="fa fa-edit"></i>
                            </a>

                            <!-- Hapus Proposal -->
                            <form action="{{ route('proposal.destroy', $proposal) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proposal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Proposal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data proposal.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Vir Aku Mau Ga paham tentang Pagination e tolong ya -->
    </div>
</div>
<!-- Modal Upload TTD -->
@foreach ($proposals as $proposal)
<div class="modal fade" id="uploadTtdModal-{{ $proposal->id }}" tabindex="-1" aria-labelledby="uploadTtdLabel-{{ $proposal->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('proposal.uploadTtd', $proposal) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadTtdLabel-{{ $proposal->id }}">Unggah TTD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="ttd" class="form-label">Unggah TTD (PDF)</label>
                        <input type="file" name="ttd" id="ttd" class="form-control" accept="application/pdf" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Unggah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


<script>
    function resetSearch() {
        window.location.href =
            "{{ route('proposal.index') }}";
    }
</script>
@endsection