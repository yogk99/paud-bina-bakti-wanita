<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\KritikSaran;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalGuru = User::where('role', 'guru')->count();
        $totalKelas = Kelas::count();
        $kritikSaranBaru = KritikSaran::where('status', 'belum_dibaca')->count();
        $pembayaranMenunggu = Pembayaran::where('status', 'menunggu')->count();
        
        return view('admin.dashboard', compact(
            'totalSiswa', 
            'totalGuru', 
            'totalKelas', 
            'kritikSaranBaru',
            'pembayaranMenunggu'
        ));
    }
}

