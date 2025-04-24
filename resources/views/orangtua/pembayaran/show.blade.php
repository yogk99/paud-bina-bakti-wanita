@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Pembayaran</h2>

    <div class="card">
        <div class="card-header">
            Pembayaran pada {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d-m-Y') }}
        </div>
        <div class="card-body">
            <p><strong>Jenis:</strong> {{ $pembayaran->jenis_pembayaran }}</p>
            <p><strong>Jumlah:</strong> Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</p>
            <p><strong>Status:</strong>
            @if($pembayaran->status == 'menunggu')
                <span class="badge bg-warning text-dark">Menunggu</span>
            @elseif($pembayaran->status == 'dikonfirmasi')
                <span class="badge bg-success">Dikonfirmasi</span>
            @else
                <span class="badge bg-danger">Ditolak</span>
            @endif
            </p>
            <p><strong>Keterangan:</strong> {{ $pembayaran->keterangan ?? '-' }}</p>
            <p><strong>Bukti Pembayaran:</strong></p>
            <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" class="img-fluid rounded" alt="Bukti Pembayaran" style="max-width: 400px;">
        </div>
        <div class="card-footer">
            <a href="{{ route('orangtua.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
