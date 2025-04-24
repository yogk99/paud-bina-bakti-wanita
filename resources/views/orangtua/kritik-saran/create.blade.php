@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tulis Kritik & Saran</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('orangtua.kritik-saran.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul') }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" class="form-control" rows="5" required>{{ old('isi') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Kirim</button>
        <a href="{{ route('orangtua.kritik-saran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
