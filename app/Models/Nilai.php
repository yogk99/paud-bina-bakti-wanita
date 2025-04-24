<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    
    protected $fillable = [
        'siswa_id',
        'sentra_id',
        'tanggal',
        'nilai_kognitif',
        'nilai_afektif',
        'nilai_psikomotorik',
        'keterangan',
    ];

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relasi ke Sentra
    public function sentra()
    {
        return $this->belongsTo(Sentra::class);
    }
}