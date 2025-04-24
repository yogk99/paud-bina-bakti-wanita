<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index()
    {
        $guru = Auth::user();
        $kelasDiampu = Kelas::where('guru_id', $guru->id)->get();
        
        return view('guru.kelas.index', compact('kelasDiampu'));
    }

    public function show(Kelas $kelas)
    {
        $guru = Auth::user();
        if ($kelas->guru_id !== $guru->id) {
            return redirect()->route('guru.kelas.index')
                ->withErrors(['error' => 'Anda tidak berwenang melihat kelas ini.']);
        }
        
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        
        return view('guru.kelas.show', compact('kelas', 'siswa'));
    }
}
