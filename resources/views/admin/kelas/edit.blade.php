@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Kelas</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kelas.update', $kela->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" value="{{ old('nama_kelas', $kela->nama_kelas) }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $kela->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Wali Kelas (Guru)</label>
            <select name="guru_id" class="form-control">
                <option value="">-- Pilih Guru --</option>
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}" {{ $kela->guru_id == $guru->id ? 'selected' : '' }}>
                        {{ $guru->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
