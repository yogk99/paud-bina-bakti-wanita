@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Kelas Diampu</h5>
                    <p class="card-text display-6">{{ $kelasDiampu->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Siswa</h5>
                    <p class="card-text display-6">{{ $totalSiswa }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Hari Ini</h5>
                    <p class="card-text display-6">{{ $jadwalHariIni->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Kelas Yang Saya Ampu</h5>
                    <a href="{{ route('guru.kelas.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    @if($kelasDiampu->count() > 0)
                        <ul class="list-group">
                            @foreach($kelasDiampu as $kelas)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $kelas->nama_kelas }}
                                    <a href="{{ route('guru.kelas.show', $kelas->id) }}" class="btn btn-sm btn-info">Detail</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="alert alert-info">
                            Anda belum memiliki kelas yang diampu
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Jadwal Hari Ini</h5>
                    <a href="{{ route('guru.jadwal.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    @if($jadwalHariIni->count() > 0)
                        <ul class="list-group">
                            @foreach($jadwalHariIni as $jadwal)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>{{ $jadwal->kelas->nama_kelas }}</strong> - {{ $jadwal->sentra->nama_sentra }}
                                        </div>
                                        <div>
                                            {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="alert alert-info">
                            Tidak ada jadwal untuk hari ini
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Menu Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('guru.jadwal.create') }}" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-calendar-plus mb-2 d-block" style="font-size: 2rem;"></i>
                                Buat Jadwal Baru
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('guru.nilai.create') }}" class="btn btn-success btn-lg w-100">
                                <i class="fas fa-star mb-2 d-block" style="font-size: 2rem;"></i>
                                Input Nilai Siswa
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('guru.kelas.index') }}" class="btn btn-info btn-lg w-100">
                                <i class="fas fa-users mb-2 d-block" style="font-size: 2rem;"></i>
                                Lihat Daftar Siswa
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection