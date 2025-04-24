@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kelas</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary mb-3">+ Tambah Kelas</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Deskripsi</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kelas as $i => $kls)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $kls->nama_kelas }}</td>
                <td>{{ $kls->deskripsi }}</td>
                <td>{{ $kls->guru ? $kls->guru->name : '-' }}</td>
                <td>
                    <a href="{{ route('admin.kelas.edit', $kls->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.kelas.destroy', $kls->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data kelas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
