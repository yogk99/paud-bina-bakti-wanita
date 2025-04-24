<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sentra extends Model
{
    protected $table = 'sentra';
    
    protected $fillable = [
        'nama_sentra',
        'deskripsi',
    ];

    // Relasi ke Jadwal
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    // Relasi ke Nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}

