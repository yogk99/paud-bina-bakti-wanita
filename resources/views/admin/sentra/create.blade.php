@extends('layouts.app')

@section('title', 'Tambah Sentra')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Sentra Baru</h2>

    <form action="{{ route('admin.sentra.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_sentra" class="form-label">Nama Sentra</label>
            <input type="text" name="nama_sentra" class="form-control @error('nama_sentra') is-invalid @enderror" value="{{ old('nama_sentra') }}" required>
            @error('nama_sentra')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="{{ route('admin.sentra.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
