@extends('layouts.app')

@section('title', 'Dashboard Orangtua')

@section('content')
@php
    $siswa = $siswa ?? null;
    $jadwalHariIni = $jadwalHariIni ?? collect();
    $nilaiTerbaru = $nilaiTerbaru ?? collect();
    $pembayaranTerbaru = $pembayaranTerbaru ?? collect();
@endphp

<div class="container py-4">

    {{-- Data Anak dan Jadwal --}}
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <strong>Data Anak</strong>
                </div>
                <div class="card-body">
                    @if($siswa)
                        <table class="table table-borderless mb-0">
                            <tr><th width="35%">Nama</th><td>{{ $siswa->nama }}</td></tr>
                            <tr><th>Tanggal Lahir</th><td>{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d F Y') }}</td></tr>
                            <tr><th>Jenis Kelamin</th><td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td></tr>
                            <tr><th>Kelas</th><td>{{ $siswa->kelas->nama_kelas ?? 'Belum terdaftar' }}</td></tr>
                        </table>
                    @else
                        <div class="alert alert-warning mb-0">Data anak belum tersedia.</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <strong>Jadwal Hari Ini</strong>
                </div>
                <div class="card-body">
                    @if($jadwalHariIni && $jadwalHariIni->count())
                        <table class="table table-sm table-hover">
                            <thead><tr><th>Sentra</th><th>Waktu</th></tr></thead>
                            <tbody>
                                @foreach($jadwalHariIni as $jadwal)
                                    <tr>
                                        <td>{{ $jadwal->sentra->nama_sentra ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('orangtua.jadwal.index') }}" class="btn btn-sm btn-outline-success mt-2">Lihat Semua Jadwal</a>
                    @else
                        <div class="alert alert-info mb-0">Tidak ada jadwal hari ini.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Nilai dan Pembayaran --}}
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <strong>Nilai Terbaru</strong>
                </div>
                <div class="card-body">
                    @if($nilaiTerbaru && $nilaiTerbaru->count())
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr><th>Tanggal</th><th>Sentra</th><th>Nilai</th><th></th></tr>
                            </thead>
                            <tbody>
                                @foreach($nilaiTerbaru as $nilai)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($nilai->tanggal)->format('d/m/Y') }}</td>
                                        <td>{{ $nilai->sentra->nama_sentra ?? '-' }}</td>
                                        <td>
                                            K: {{ $nilai->nilai_kognitif ?? '-' }},
                                            A: {{ $nilai->nilai_afektif ?? '-' }},
                                            P: {{ $nilai->nilai_psikomotorik ?? '-' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('orangtua.nilai.show', $nilai->id) }}" class="btn btn-sm btn-outline-info">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('orangtua.nilai.index') }}" class="btn btn-sm btn-outline-info mt-2">Lihat Semua Nilai</a>
                    @else
                        <div class="alert alert-info mb-0">Belum ada nilai tersedia.</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <strong>Pembayaran Terbaru</strong>
                </div>
                <div class="card-body">
                    @if($pembayaranTerbaru && $pembayaranTerbaru->count())
                        <table class="table table-sm table-hover">
                            <thead><tr><th>Tanggal</th><th>Jenis</th><th>Status</th><th></th></tr></thead>
                            <tbody>
                                @foreach($pembayaranTerbaru as $pembayaran)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d/m/Y') }}</td>
                                        <td>{{ $pembayaran->jenis_pembayaran }}</td>
                                        <td>
                                            @if($pembayaran->status == 'menunggu')
                                                <span class="badge bg-warning text-dark">Menunggu</span>
                                            @elseif($pembayaran->status == 'dikonfirmasi')
                                                <span class="badge bg-success">Dikonfirmasi</span>
                                            @else
                                                <span class="badge bg-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('orangtua.pembayaran.show', $pembayaran->id) }}" class="btn btn-sm btn-outline-warning">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('orangtua.pembayaran.index') }}" class="btn btn-sm btn-outline-warning mt-2">Lihat Semua Pembayaran</a>
                    @else
                        <div class="alert alert-info mb-0">Belum ada data pembayaran.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
