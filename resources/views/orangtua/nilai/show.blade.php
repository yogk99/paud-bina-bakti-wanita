@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Nilai</h2>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Nilai Tanggal: {{ \Carbon\Carbon::parse($nilai->tanggal)->format('d-m-Y') }}
        </div>
        <div class="card-body">
            <p><strong>Sentra:</strong> {{ $nilai->sentra->nama_sentra ?? '-' }}</p>
            <p><strong>Nilai Kognitif:</strong> {{ $nilai->nilai_kognitif ?? '-' }}</p>
            <p><strong>Nilai Afektif:</strong> {{ $nilai->nilai_afektif ?? '-' }}</p>
            <p><strong>Nilai Psikomotorik:</strong> {{ $nilai->nilai_psikomotorik ?? '-' }}</p>
            <p><strong>Keterangan:</strong> {{ $nilai->keterangan ?? '-' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('orangtua.nilai.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
