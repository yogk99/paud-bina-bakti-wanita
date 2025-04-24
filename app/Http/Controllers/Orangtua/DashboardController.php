<?php

namespace App\Http\Controllers\Orangtua;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function index()
    {
        $orangtua = Auth::user();
        $siswa = Siswa::where('user_id', $orangtua->id)->first();
        
        if (!$siswa) {
            return view('orangtua.dashboard', compact('orangtua'));
        }
        
        $jadwalHariIni = null;
        if ($siswa->kelas) {
            $jadwalHariIni = $siswa->kelas->jadwal()
                ->where('hari', now()->format('l'))
                ->with('sentra')
                ->get();
        }
        
        $nilaiTerbaru = Nilai::where('siswa_id', $siswa->id)
            ->orderBy('tanggal', 'desc')
            ->limit(5)
            ->get();
            
        $pembayaranTerbaru = Pembayaran::where('siswa_id', $siswa->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('orangtua.dashboard', compact(
            'orangtua', 
            'siswa', 
            'jadwalHariIni', 
            'nilaiTerbaru', 
            'pembayaranTerbaru'
        ));
    }
}