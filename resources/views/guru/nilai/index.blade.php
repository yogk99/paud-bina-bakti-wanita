@extends('layouts.app')

@section('title', 'Data Nilai Siswa')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Nilai Siswa</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @error('error')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <a href="{{ route('guru.nilai.create') }}" class="btn btn-primary">+ Tambah Nilai</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Sentra</th>
                    <th>Tanggal</th>
                    <th>Kognitif</th>
                    <th>Afektif</th>
                    <th>Psikomotorik</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($nilais as $index => $nilai)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $nilai->siswa->nama }}</td>
                        <td>{{ $nilai->sentra->nama_sentra }}</td>
                        <td>{{ $nilai->tanggal }}</td>
                        <td>{{ $nilai->nilai_kognitif }}</td>
                        <td>{{ $nilai->nilai_afektif }}</td>
                        <td>{{ $nilai->nilai_psikomotorik }}</td>
                        <td>{{ $nilai->keterangan }}</td>
                        <td>
                            <a href="{{ route('guru.nilai.edit', $nilai->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('guru.nilai.destroy', $nilai->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus nilai ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Belum ada data nilai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
