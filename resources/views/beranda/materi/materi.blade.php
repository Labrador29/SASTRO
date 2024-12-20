<section id="agenda" style="margin-top: 30px;" data-aos="fade-up">
    <div class="container py-5">
        <div class="header-agenda text-center">
            <h2 class="fw-bold">Materi</h2>
            <p class="text-secondary">Berisi Materi yang umum </p>
        </div>


        <div>
            <h3></h3>

        </div>



        <div class="table-responsive" style="margin-top: 30px;">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                style="text-align: center;">
                <thead style="background-color: #430086">
                    <tr class="text-white">
                        <th>No</th>
                        <th>Nama Materi</th>
                        <th>Unduh</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Materi</th>
                        <th>Unduh</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($materi as $m)
                    @if (!$m->is_hidden)
                    <tr>
                        <td>{{ $m['id'] }}</td>
                        <td>{{ $m->judul }}</td>
                        <!-- <td><a href="{{ asset($m->file_path) }}" download>Unduh File</a></td> -->
                        <td><a href="{{ route('materi.download', $m->id) }}">Unduh File</a></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>