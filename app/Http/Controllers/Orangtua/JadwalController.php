<?php

namespace App\Http\Controllers\Orangtua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

class JadwalController extends Controller
{
    public function index()
    {
        $orangtua = Auth::user();
        $siswa = Siswa::where('user_id', $orangtua->id)->first();
        
        if (!$siswa || !$siswa->kelas) {
            return view('orangtua.jadwal.index')->withErrors(['error' => 'Siswa belum terdaftar dalam kelas.']);
        }
        
        $jadwal = $siswa->kelas->jadwal()
            ->with('sentra')
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();
        
        return view('orangtua.jadwal.index', compact('siswa', 'jadwal'));
    }
}