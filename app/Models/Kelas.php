<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    
    protected $fillable = [
        'nama_kelas',
        'deskripsi',
        'guru_id',
    ];

    // Relasi ke Guru
    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    // Relasi ke Jadwal
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}