@extends('layouts.app')

@section('title', 'Data Sentra')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Manajemen Sentra</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.sentra.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Sentra
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Sentra</th>
                        <th>Deskripsi</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sentras as $index => $sentra)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sentra->nama_sentra }}</td>
                            <td>{{ $sentra->deskripsi ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.sentra.edit', $sentra->id) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <form action="{{ route('admin.sentra.destroy', $sentra->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data sentra.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
