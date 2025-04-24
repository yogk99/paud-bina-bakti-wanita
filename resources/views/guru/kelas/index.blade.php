@extends('layouts.app')

@section('title', 'Kelas Saya')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Kelas yang Diampu</h2>

    @error('error')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="row">
        @forelse($kelasDiampu as $kelas)
            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kelas->nama_kelas }}</h5>
                        <p class="card-text">Jumlah siswa: {{ $kelas->siswa->count() }}</p>
                        <a href="{{ route('guru.kelas.show', $kelas->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Anda belum memiliki kelas yang diampu.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
