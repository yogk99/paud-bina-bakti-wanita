@extends('layouts.app')

@section('title', 'Jadwal Mengajar')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Jadwal Mengajar</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @error('error')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <a href="{{ route('guru.jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Sentra</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwals as $i => $jadwal)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $jadwal->kelas->nama_kelas }}</td>
                            <td>{{ $jadwal->sentra->nama_sentra }}</td>
                            <td>{{ $jadwal->hari }}</td>
                            <td>{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                            <td>
                                <a href="{{ route('guru.jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('guru.jadwal.destroy', $jadwal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">Belum ada jadwal.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
