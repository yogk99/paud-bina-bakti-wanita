@extends('layouts.app')

@section('title', 'Detail Pembayaran')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detail Pembayaran</h2>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Nama Siswa:</strong> {{ $pembayaran->siswa->nama ?? '-' }}</p>
            <p><strong>Jumlah:</strong> Rp{{ number_format($pembayaran->jumlah, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> 
                <span class="badge 
                    @if($pembayaran->status == 'menunggu') bg-warning 
                    @elseif($pembayaran->status == 'dikonfirmasi') bg-success 
                    @else bg-danger @endif">
                    {{ ucfirst($pembayaran->status) }}
                </span>
            </p>
            <p><strong>Keterangan:</strong> {{ $pembayaran->keterangan ?? '-' }}</p>
            <p><strong>Bukti Pembayaran:</strong><br>
                @if($pembayaran->bukti)
                    <span class="text-muted">Tidak ada</span>    
                @else
                    <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" alt="Bukti Pembayaran" style="max-width: 300px;" class="img-thumbnail">
                @endif
            </p>
        </div>
    </div>

    <form action="{{ route('admin.pembayaran.updateStatus', $pembayaran->id) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="status" class="form-label">Status Pembayaran</label>
            <select name="status" class="form-select" required>
                <option value="menunggu" {{ $pembayaran->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="dikonfirmasi" {{ $pembayaran->status == 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                <option value="ditolak" {{ $pembayaran->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $pembayaran->keterangan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Status</button>
        <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
