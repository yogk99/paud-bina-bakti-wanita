@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Kritik & Saran Anda</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('orangtua.kritik-saran.create') }}" class="btn btn-primary mb-3">Tulis Kritik & Saran</a>

    @if($kritikSaran->count())
        <div class="list-group">
            @foreach($kritikSaran as $item)
                <a href="{{ route('orangtua.kritik-saran.show', $item->id) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-1">{{ $item->judul }}</h5>
                        <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                    </div>
                    <p class="mb-1 text-truncate">{{ $item->isi }}</p>
                    <span class="badge 
                        @if($item->status === 'dibaca') bg-success 
                        @else bg-secondary 
                        @endif">
                        {{ ucfirst(str_replace('_', ' ', $item->status)) }}
                    </span>
                </a>
            @endforeach
        </div>
    @else
        <div class="alert alert-info mt-3">Belum ada kritik atau saran yang dikirim.</div>
    @endif
</div>
@endsection
