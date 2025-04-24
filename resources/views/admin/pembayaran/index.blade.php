@extends('layouts.app')

@section('title', 'Data Pembayaran')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Manajemen Pembayaran</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Siswa</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Bukti</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pembayarans as $index => $pembayaran)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pembayaran->siswa->nama ?? '-' }}</td>
                            <td>Rp{{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge 
                                    @if($pembayaran->status == 'menunggu') bg-warning 
                                    @elseif($pembayaran->status == 'dikonfirmasi') bg-success 
                                    @else bg-danger @endif">
                                    {{ ucfirst($pembayaran->status) }}
                                </span>
                            </td>
                            <td>
                                @if($pembayaran->bukti)
                                    <span class="text-muted">Tidak Ada</span>    
                                @else
                                    <a href="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" target="_blank" class="btn btn-sm btn-info">Lihat</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.pembayaran.show', $pembayaran->id) }}" class="btn btn-sm btn-primary">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data pembayaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
