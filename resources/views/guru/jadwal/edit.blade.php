@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Jadwal</h2>

    <form action="{{ route('guru.jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kelas_id" class="form-label">Kelas</label>
            <select name="kelas_id" class="form-select" required>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}" {{ $jadwal->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="sentra_id" class="form-label">Sentra</label>
            <select name="sentra_id" class="form-select" required>
                @foreach($sentra as $s)
                    <option value="{{ $s->id }}" {{ $jadwal->sentra_id == $s->id ? 'selected' : '' }}>
                        {{ $s->nama_sentra }}
                    </option>
                @endforeach
            </select>
            @error('sentra_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <select name="hari" class="form-select" required>
                @foreach($hari as $h)
                    <option value="{{ $h }}" {{ $jadwal->hari == $h ? 'selected' : '' }}>{{ $h }}</option>
                @endforeach
            </select>
            @error('hari') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" value="{{ $jadwal->jam_mulai }}" required>
            @error('jam_mulai') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" value="{{ $jadwal->jam_selesai }}" required>
            @error('jam_selesai') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('guru.jadwal.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
