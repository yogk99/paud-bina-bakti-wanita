@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Riwayat Pembayaran</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('orangtua.pembayaran.create') }}" class="btn btn-primary">Tambah Pembayaran</a>
    </div>

    @if($pembayaran->count())
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Tanggal Bayar</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Bukti</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayaran as $item)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') }}</td>
                            <td>{{ $item->jenis_pembayaran }}</td>
                            <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td>
                                @if($item->status == 'menunggu')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($item->status == 'dikonfirmasi')
                                    <span class="badge bg-success">Dikonfirmasi</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $item->bukti_pembayaran) }}" target="_blank" class="btn btn-sm btn-secondary">Lihat</a>
                            </td>
                            <td>
                                <a href="{{ route('orangtua.pembayaran.show', $item->id) }}" class="btn btn-sm btn-primary">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">Belum ada data pembayaran.</div>
    @endif
</div>
@endsection
