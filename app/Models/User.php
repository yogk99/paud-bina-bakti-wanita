<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi ke Siswa (untuk pengguna orangtua)
    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    // Relasi ke Kelas (untuk pengguna guru)
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'guru_id');
    }

    // Relasi ke KritikSaran
    public function kritikSaran()
    {
        return $this->hasMany(KritikSaran::class);
    }

    // Cek apakah user adalah admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Cek apakah user adalah guru
    public function isGuru()
    {
        return $this->role === 'guru';
    }

    // Cek apakah user adalah orangtua
    public function isOrangtua()
    {
        return $this->role === 'orangtua';
    }
}
