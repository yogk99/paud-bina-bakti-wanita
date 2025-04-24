<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    
    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_orangtua',
        'user_id',
        'kelas_id',
    ];

    // Relasi ke User (orangtua)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // Relasi ke Nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    // Relasi ke Pembayaran
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
