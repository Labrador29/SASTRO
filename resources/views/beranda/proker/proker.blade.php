<section id="agenda" style="margin-top: 30px;" data-aos="fade-up">
    <div class="container py-5">
        <div class="header-agenda text-center">
            <h2 class="fw-bold">Program Kerja Dewan Ambalan</h2>
            <p class="text-secondary">Di dalam dewan ambalan sastrodikoro terdapat beberapa program kerja setiap tahun
                yang berbeda - beda</p>
        </div>

        <div class="table-responsive" style="margin-top: 30px;">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                style="text-align: center;">
                <thead style="background-color: #430086">
                    <tr class="text-white">
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($proker as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['Tanggal'] }}</td>
                        <td>{{ $item['lokasi'] }}</td>
                        <td>
                            <span
                                style="background-color: {{ $item['status'] === 'Aktif' ? 'rgb(0, 255, 128)' : ($item['status'] === 'Terlaksana' ? 'rgb(0, 128, 255)' : 'rgb(255, 77, 77)') }}; color: white; padding: 2px 8px; border-radius: 5px;">
                                {{ $item['status'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>