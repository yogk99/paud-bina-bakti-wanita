<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Auth::user();
        $kelasDiampu = Kelas::where('guru_id', $guru->id)->get();
        $totalSiswa = Siswa::whereIn('kelas_id', $kelasDiampu->pluck('id'))->count();
        $jadwalHariIni = Jadwal::whereIn('kelas_id', $kelasDiampu->pluck('id'))
            ->where('hari', now()->format('l'))
            ->with(['kelas', 'sentra'])
            ->get();
        
        return view('guru.dashboard', compact('kelasDiampu', 'totalSiswa', 'jadwalHariIni'));
    }
}