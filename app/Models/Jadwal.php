<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    
    protected $fillable = [
        'kelas_id',
        'sentra_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // Relasi ke Sentra
    public function sentra()
    {
        return $this->belongsTo(Sentra::class);
    }
}
