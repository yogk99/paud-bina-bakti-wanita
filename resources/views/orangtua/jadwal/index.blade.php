@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Jadwal Kegiatan Anak</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @if(isset($siswa) && $siswa)
        <div class="mb-3">
            <h5>Nama Anak: {{ $siswa->nama }}</h5>
            <p>Kelas: {{ $siswa->kelas->nama_kelas ?? 'Belum ada kelas' }}</p>
        </div>

        @if($jadwal->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Sentra</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwal as $item)
                            <tr>
                                <td>{{ $item->hari }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}</td>
                                <td>{{ $item->sentra->nama_sentra ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">Belum ada jadwal untuk kelas ini.</div>
        @endif
    @else
        <div class="alert alert-warning">Data siswa tidak ditemukan atau belum memiliki kelas.</div>
    @endif
</div>
@endsection
