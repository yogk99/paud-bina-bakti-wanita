@extends('layouts.app')

@section('title', 'Detail Kritik & Saran')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detail Kritik dan Saran</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama Orangtua:</strong> {{ $kritikSaran->user->name ?? '-' }}</p>
            <p><strong>Status:</strong> 
                <span class="badge {{ $kritikSaran->status === 'belum_dibaca' ? 'bg-warning' : 'bg-success' }}">
                    {{ ucfirst($kritikSaran->status) }}
                </span>
            </p>
            <p><strong>Tanggal:</strong> {{ $kritikSaran->created_at->format('d M Y, H:i') }}</p>
            <hr>
            <p><strong>Isi Kritik/Saran:</strong></p>
            <p>{{ $kritikSaran->isi }}</p>
        </div>
    </div>

    <a href="{{ route('admin.kritik-saran.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
