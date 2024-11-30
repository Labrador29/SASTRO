@extends('layouts.main')

@section('container')
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="row">
                    <div class="col-2 d-flex align-items-center justify-content-center" style="padding-left: 60px;">
                        <img src="{{ asset('icons/logo1.png') }}" class="w-100" style="max-width: 300px;">
                    </div>
                    <div class="col d-flex align-items-center" style="padding-left: 20px;">
                        <div>
                            <h1 class="fs-2 text-primary text-uppercase fw-bold"
                                style="font-size: 2rem; font-weight: 800; font-family: 'Poppins', sans-serif;">
                                Dewan Ambalan Sastrodikoro
                            </h1>
                            <h1 class="fs-2 text-primary text-uppercase fw-bold"
                                style="font-size: 2rem; font-weight: 800; font-family: 'Poppins', sans-serif;">
                                SMK Negeri 1 Lumajang
                            </h1>
                            <h4 class="fs-5 text-primary text-capitalize"
                                style="font-size: 1.2rem; font-weight: 700; font-family: 'Poppins', sans-serif;">
                                Jl. H. O.S. Cokroaminoto No.161, Tompokersan, Kec. Lumajang, Kabupaten Lumajang, Jawa Timur
                                67316
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="container mx-auto px-4 py-8">
                    <div class="row" style="margin-top: 40px;">
                        <div class="col d-flex">
                            <div class="card shadow-sm w-100">
                                <div class="card-header bg-light-success">
                                    <h3 class="card-title text-uppercase">Total Anggota</h3>
                                </div>
                                <div class="card-body bg-success rounded-bottom">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <i class="fas fa-users fs-1 text-white"></i>
                                        </div>
                                        <div
                                            class="col-6 d-flex align-items-center justify-content-center fw-bold text-white">
                                            <div class="fs-1 totalPendaftaran">
                                                {{ $totalPengurus }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card shadow-sm w-100">
                                <div class="card-header bg-light-info">
                                    <h3 class="card-title text-uppercase">Total Pengguna</h3>
                                </div>
                                <div class="card-body bg-info rounded-bottom">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <i class="fa-solid fa-user-alt fs-1 text-white"></i>
                                        </div>
                                        <div
                                            class="col-6 d-flex align-items-center justify-content-center fw-bold text-white">
                                            <div class="fs-1 totalPendataan">
                                                {{ $totalPengguna }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card shadow-sm w-100">
                                <div class="card-header bg-light-warning">
                                    <h3 class="card-title text-uppercase">Total Kegiatan</h3>
                                </div>
                                <div class="card-body bg-warning rounded-bottom">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <i class="fa-solid fa-bookmark fs-1 text-white"></i>
                                        </div>
                                        <div
                                            class="col-6 d-flex align-items-center justify-content-center fw-bold text-white">
                                            <div class="fs-1 totalPenetapan">
                                                {{ $totalEvents }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col d-flex">
                            <div class="card shadow-sm w-100">
                                <div class="card-header bg-light-danger">
                                    <h3 class="card-title text-uppercase">Total Bidang</h3>
                                </div>
                                <div class="card-body bg-danger rounded-bottom">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <i class="fa-solid fa-layer-group fs-1 text-white"></i>
                                        </div>
                                        <div
                                            class="col-6 d-flex align-items-center justify-content-center fw-bold text-white">
                                            <div class="fs-1 totalPembayaran">
                                                {{ $totalBidang }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Acara Terbaru -->
                    <div class="bg-white rounded-lg shadow mb-8" style="margin-top: 50px">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-4">Acara Terbaru</h2>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nama Acara</th>
                                            <th
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tanggal</th>
                                            <th
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Lokasi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($recentEvents as $event)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $event->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $event->event_date->format('d M Y H:i') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $event->location }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Absensi Terbaru -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-4">Absensi Terbaru</h2>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Anggota</th>
                                            <th
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Acara</th>
                                            <th
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Waktu Absen</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($recentAttendances as $attendance)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->user->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->event->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $attendance->check_in_time->format('d M Y H:i:s') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
