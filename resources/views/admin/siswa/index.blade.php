@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Data Siswa</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary">+ Tambah Siswa</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Nama Orangtua</th>
                <th>Akun Orangtua</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $index => $siswa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $siswa->nama_orangtua }}</td>
                <td>{{ $siswa->user->name ?? '-' }}</td>
                <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Belum ada data siswa.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
