@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Siswa</h5>
                    <p class="card-text display-6">{{ $totalSiswa }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Guru</h5>
                    <p class="card-text display-6">{{ $totalGuru }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total Kelas</h5>
                    <p class="card-text display-6">{{ $totalKelas }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Kritik & Saran Baru</h5>
                    <p class="card-text display-6">{{ $kritikSaranBaru }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Pembayaran Menunggu Konfirmasi</h5>
                    <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    @if($pembayaranMenunggu > 0)
                        <div class="alert alert-warning">
                            Terdapat {{ $pembayaranMenunggu }} pembayaran yang menunggu konfirmasi
                        </div>
                        <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-warning">Proses Sekarang</a>
                    @else
                        <div class="alert alert-success">
                            Tidak ada pembayaran yang menunggu konfirmasi
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Kritik & Saran Terbaru</h5>
                    <a href="{{ route('admin.kritik-saran.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    @if($kritikSaranBaru > 0)
                        <div class="alert alert-info">
                            Terdapat {{ $kritikSaranBaru }} kritik & saran yang belum dibaca
                        </div>
                        <a href="{{ route('admin.kritik-saran.index') }}" class="btn btn-info">Lihat Sekarang</a>
                    @else
                        <div class="alert alert-success">
                            Tidak ada kritik & saran baru
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
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-user-plus mb-2 d-block" style="font-size: 2rem;"></i>
                                Tambah Pengguna
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.siswa.create') }}" class="btn btn-success btn-lg w-100">
                                <i class="fas fa-user-graduate mb-2 d-block" style="font-size: 2rem;"></i>
                                Tambah Siswa
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.kelas.create') }}" class="btn btn-info btn-lg w-100">
                                <i class="fas fa-school mb-2 d-block" style="font-size: 2rem;"></i>
                                Tambah Kelas
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.sentra.create') }}" class="btn btn-warning btn-lg w-100">
                                <i class="fas fa-chalkboard mb-2 d-block" style="font-size: 2rem;"></i>
                                Tambah Sentra
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
