@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Kritik & Saran</h2>

    <div class="card">
        <div class="card-body">
            <h4>{{ $kritikSaran->judul }}</h4>
            <small class="text-muted">Dikirim pada {{ $kritikSaran->created_at->format('d M Y H:i') }}</small>
            <hr>
            <p>{{ $kritikSaran->isi }}</p>
            <hr>
            <p><strong>Status:</strong> 
                <span class="badge 
                    @if($kritikSaran->status === 'dibaca') bg-success 
                    @else bg-secondary 
                    @endif">
                    {{ ucfirst(str_replace('_', ' ', $kritikSaran->status)) }}
                </span>
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('orangtua.kritik-saran.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
