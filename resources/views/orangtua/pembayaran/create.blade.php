@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Form Pembayaran</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('orangtua.pembayaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label>
            <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-select" required>
                <option value="">-- Pilih --</option>
                @foreach($jenisPembayaran as $jenis)
                    <option value="{{ $jenis }}" {{ old('jenis_pembayaran') == $jenis ? 'selected' : '' }}>
                        {{ $jenis }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah (Rp)</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control" value="{{ old('tanggal_bayar') }}" required>
        </div>

        <div class="mb-3">
            <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran (gambar)</label>
            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
            <textarea name="keterangan" id="keterangan" rows="3" class="form-control">{{ old('keterangan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Kirim Pembayaran</button>
    </form>
</div>
@endsection
