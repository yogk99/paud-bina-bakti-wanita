<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    
    protected $fillable = [
        'siswa_id',
        'jenis_pembayaran',
        'jumlah',
        'tanggal_bayar',
        'bukti_pembayaran',
        'status',
        'keterangan',
    ];

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}