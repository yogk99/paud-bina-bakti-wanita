@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Nilai Anak</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @if(isset($siswa))
        <div class="mb-3">
            <h5>Nama Anak: {{ $siswa->nama }}</h5>
        </div>

        @if($nilai->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Tanggal</th>
                            <th>Sentra</th>
                            <th>Kognitif</th>
                            <th>Afektif</th>
                            <th>Psikomotorik</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nilai as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->sentra->nama_sentra ?? '-' }}</td>
                                <td>{{ $item->nilai_kognitif ?? '-' }}</td>
                                <td>{{ $item->nilai_afektif ?? '-' }}</td>
                                <td>{{ $item->nilai_psikomotorik ?? '-' }}</td>
                                <td>{{ $item->keterangan ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('orangtua.nilai.show', $item->id) }}" class="btn btn-sm btn-primary">Lihat Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">Belum ada data nilai tersedia.</div>
        @endif
    @else
        <div class="alert alert-warning">Data siswa tidak ditemukan.</div>
    @endif
</div>
@endsection
