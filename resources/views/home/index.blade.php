@extends('layout.main')
@section('container')
    <section id="hero" class="px-0">
        <div class="container text-center text-white">
            <div class="hero-title">
                <div class="hero-text">Welcome To <br> Dewan Ambalan Sastrodikoro</div>
                <h4>Gugus Depan SMK Negeri 1 Lumajang</h4>
            </div>
        </div>
    </section>

    <section id="program" style="margin-top: -30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3" data-aos="fade-up">
                    <div class="bg-white rounded-3 shadow p-3 d-flex align-items-center">
                        <div>
                            <h5>GIAT PENGGGALANG SASTRODIKORO</h5>
                        </div>
                        <img src="{{ asset('program/proker.png') }}" height="55" width="55" alt="">
                    </div>
                </div>
                <div class="col-lg-3" data-aos="fade-up">
                    <div class="bg-white rounded-3 shadow p-3 d-flex align-items-center">
                        <div>
                            <h5>KEMDA (KEMAH PEMUDA)</h5>
                        </div>
                        <img src="{{ asset('program/proker.png') }}" height="55" width="55" alt="">
                    </div>
                </div>
                <div class="col-lg-3" data-aos="fade-up">
                    <div class="bg-white rounded-3 shadow p-3 d-flex align-items-center">
                        <div>
                            <h5>MUSYAWARAH PENEGAK</h5>
                        </div>
                        <img src="{{ asset('program/mustegak.png') }}" height="55" width="55" alt="">
                    </div>
                </div>
                <div class="col-lg-3" data-aos="fade-up">
                    <div class="bg-white rounded-3 shadow p-3 d-flex align-items-center">
                        <div>
                            <h5>ORIENTASI DEWAN AMBALAN</h5>
                        </div>
                        <img src="{{ asset('program/proker.png') }}" height="55" width="55" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('home.about')
    @include('home.agenda')
    @include('home.daftar')
    @include('home.bidang')
    @include('home.faq')
@endsection