@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Nilai Siswa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('guru.nilai.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="siswa_id" class="form-label">Siswa</label>
            <select name="siswa_id" id="siswa_id" class="form-select" required>
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}" {{ $nilai->siswa_id == $s->id ? 'selected' : '' }}>
                        {{ $s->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sentra_id" class="form-label">Sentra</label>
            <select name="sentra_id" id="sentra_id" class="form-select" required>
                @foreach($sentra as $s)
                    <option value="{{ $s->id }}" {{ $nilai->sentra_id == $s->id ? 'selected' : '' }}>
                        {{ $s->nama_sentra }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $nilai->tanggal->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="nilai_kognitif" class="form-label">Nilai Kognitif</label>
            <input type="number" name="nilai_kognitif" class="form-control" min="0" max="100" value="{{ $nilai->nilai_kognitif }}">
        </div>

        <div class="mb-3">
            <label for="nilai_afektif" class="form-label">Nilai Afektif</label>
            <input type="number" name="nilai_afektif" class="form-control" min="0" max="100" value="{{ $nilai->nilai_afektif }}">
        </div>

        <div class="mb-3">
            <label for="nilai_psikomotorik" class="form-label">Nilai Psikomotorik</label>
            <input type="number" name="nilai_psikomotorik" class="form-control" min="0" max="100" value="{{ $nilai->nilai_psikomotorik }}">
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $nilai->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('guru.nilai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
