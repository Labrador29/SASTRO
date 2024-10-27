@extends('layout.main')

@section('container')
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('assets/about.jpg') }}" class="img-fluid rounded-3 shadow" alt="About Image">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">About Dewan Ambalan Sastrodikoro</h2>
                    <p class="text-secondary">
                        Gerakan Pramuka SMK Negeri 1 Lumajang diresmikan pada tanggal 9 Nopember 1987, yang pada waktu itu
                        masih bernama
                        Sekolah Menengah Ekonomi Atas (SMEA) yang terletak di Jalan Sastrodikoro, sehingga nama Sastrodikoro
                        ditetapkan sebagai nama Gugus Depan Gerakan Pramuka SMK Negeri 1 Lumajang. Nama Sastrodikoro adalah
                        nama Bupati Lumajang pada masa Perjuangan yang memimpin Lumajang sejak tahun 1948-1959.
                    </p>
                    <a href="#more-info" class="btn btn-primary px-4 py-2">Learn More</a>
                </div>
            </div>
        </div>
    </section>
@endsection
