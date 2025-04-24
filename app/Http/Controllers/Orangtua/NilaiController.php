<?php

namespace App\Http\Controllers\Orangtua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $orangtua = Auth::user();
        $siswa = Siswa::where('user_id', $orangtua->id)->first();
        
        if (!$siswa) {
            return view('orangtua.nilai.index')->withErrors(['error' => 'Data siswa tidak ditemukan.']);
        }
        
        $nilai = Nilai::where('siswa_id', $siswa->id)
            ->with('sentra')
            ->orderBy('tanggal', 'desc')
            ->get();
        
        return view('orangtua.nilai.index', compact('siswa', 'nilai'));
    }

    public function show(Nilai $nilai)
    {
        $orangtua = Auth::user();
        $siswa = Siswa::where('user_id', $orangtua->id)->first();
        
        if (!$siswa || $nilai->siswa_id !== $siswa->id) {
            return redirect()->route('orangtua.nilai.index')
                ->withErrors(['error' => 'Anda tidak berwenang melihat nilai ini.']);
        }
        
        return view('orangtua.nilai.show', compact('nilai'));
    }
}