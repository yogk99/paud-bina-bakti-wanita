@extends('layouts.app')

@section('title', 'Detail Kelas')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Detail Kelas: {{ $kelas->nama_kelas }}</h2>

    @error('error')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="card mb-4">
        <div class="card-body">
            <h5>Informasi Kelas</h5>
            <p><strong>Nama Kelas:</strong> {{ $kelas->nama_kelas }}</p>
            <p><strong>Jumlah Siswa:</strong> {{ $siswa->count() }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Daftar Siswa</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Orang Tua</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswa as $index => $s)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ ucfirst($s->jenis_kelamin) }}</td>
                            <td>{{ $s->user->name ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada siswa di kelas ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('guru.kelas.index') }}" class="btn btn-secondary mt-3">Kembali ke Kelas</a>
</div>
@endsection
