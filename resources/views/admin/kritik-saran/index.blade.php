@extends('layouts.app')

@section('title', 'Kritik dan Saran')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Kritik dan Saran dari Orangtua</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Orangtua</th>
                        <th>Isi</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th style="width: 130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kritikSarans as $index => $kritik)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kritik->user->name ?? 'Tidak diketahui' }}</td>
                            <td>{{ Str::limit($kritik->isi, 50) }}</td>
                            <td>
                                <span class="badge {{ $kritik->status === 'belum_dibaca' ? 'bg-warning' : 'bg-success' }}">
                                    {{ ucfirst($kritik->status) }}
                                </span>
                            </td>
                            <td>{{ $kritik->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.kritik-saran.show', $kritik->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                                <form action="{{ route('admin.kritik-saran.destroy', $kritik->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada kritik dan saran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
