@extends('layouts.app')

@section('title', 'Edit Sentra')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Sentra</h2>

    <form action="{{ route('admin.sentra.update', $sentra->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_sentra" class="form-label">Nama Sentra</label>
            <input type="text" name="nama_sentra" class="form-control @error('nama_sentra') is-invalid @enderror" value="{{ old('nama_sentra', $sentra->nama_sentra) }}" required>
            @error('nama_sentra')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi', $sentra->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-success me-2">Update</button>
            <a href="{{ route('admin.sentra.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
