@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Jadwal Mengajar</h2>

    <form action="{{ route('guru.jadwal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kelas_id" class="form-label">Kelas</label>
            <select name="kelas_id" class="form-select" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="sentra_id" class="form-label">Sentra</label>
            <select name="sentra_id" class="form-select" required>
                <option value="">-- Pilih Sentra --</option>
                @foreach($sentra as $s)
                    <option value="{{ $s->id }}" {{ old('sentra_id') == $s->id ? 'selected' : '' }}>
                        {{ $s->nama_sentra }}
                    </option>
                @endforeach
            </select>
            @error('sentra_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <select name="hari" class="form-select" required>
                <option value="">-- Pilih Hari --</option>
                @foreach($hari as $h)
                    <option value="{{ $h }}" {{ old('hari') == $h ? 'selected' : '' }}>{{ $h }}</option>
                @endforeach
            </select>
            @error('hari') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" value="{{ old('jam_mulai') }}" required>
            @error('jam_mulai') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" value="{{ old('jam_selesai') }}" required>
            @error('jam_selesai') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('guru.jadwal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
