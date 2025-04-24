<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Sentra;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $guru = Auth::user();
        $kelasIds = Kelas::where('guru_id', $guru->id)->pluck('id');
        $siswaIds = Siswa::whereIn('kelas_id', $kelasIds)->pluck('id');
        
        $nilais = Nilai::whereIn('siswa_id', $siswaIds)
            ->with(['siswa', 'sentra'])
            ->orderBy('tanggal', 'desc')
            ->get();
            
        return view('guru.nilai.index', compact('nilais'));
    }

    public function create()
    {
        $guru = Auth::user();
        $kelasIds = Kelas::where('guru_id', $guru->id)->pluck('id');
        $siswa = Siswa::whereIn('kelas_id', $kelasIds)->get();
        $sentra = Sentra::all();
        
        return view('guru.nilai.create', compact('siswa', 'sentra'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'sentra_id' => 'required|exists:sentra,id',
            'tanggal' => 'required|date',
            'nilai_kognitif' => 'nullable|integer|min:0|max:100',
            'nilai_afektif' => 'nullable|integer|min:0|max:100',
            'nilai_psikomotorik' => 'nullable|integer|min:0|max:100',
            'keterangan' => 'nullable|string',
        ]);

        $guru = Auth::user();
        $kelasIds = Kelas::where('guru_id', $guru->id)->pluck('id');
        $siswa = Siswa::where('id', $validated['siswa_id'])
            ->whereIn('kelas_id', $kelasIds)
            ->first();
            
        if (!$siswa) {
            return redirect()->back()->withErrors(['siswa_id' => 'Anda hanya dapat memberikan nilai untuk siswa di kelas yang Anda ampu.']);
        }

        Nilai::create($validated);

        return redirect()->route('guru.nilai.index')
            ->with('success', 'Nilai berhasil ditambahkan');
    }

    public function edit(Nilai $nilai)
    {
        $guru = Auth::user();
        $kelasIds = Kelas::where('guru_id', $guru->id)->pluck('id');
        $siswa = Siswa::whereIn('kelas_id', $kelasIds)->get();
        $sentra = Sentra::all();
        
        $siswaIds = $siswa->pluck('id')->toArray();
        if (!in_array($nilai->siswa_id, $siswaIds)) {
            return redirect()->route('guru.nilai.index')
                ->withErrors(['error' => 'Anda tidak berwenang mengedit nilai ini.']);
        }
        
        return view('guru.nilai.edit', compact('nilai', 'siswa', 'sentra'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'sentra_id' => 'required|exists:sentra,id',
            'tanggal' => 'required|date',
            'nilai_kognitif' => 'nullable|integer|min:0|max:100',
            'nilai_afektif' => 'nullable|integer|min:0|max:100',
            'nilai_psikomotorik' => 'nullable|integer|min:0|max:100',
            'keterangan' => 'nullable|string',
        ]);

        $guru = Auth::user();
        $kelasIds = Kelas::where('guru_id', $guru->id)->pluck('id');
        $siswa = Siswa::where('id', $validated['siswa_id'])
            ->whereIn('kelas_id', $kelasIds)
            ->first();
            
        if (!$siswa) {
            return redirect()->back()->withErrors(['siswa_id' => 'Anda hanya dapat memberikan nilai untuk siswa di kelas yang Anda ampu.']);
        }

        $nilai->update($validated);

        return redirect()->route('guru.nilai.index')
            ->with('success', 'Nilai berhasil diperbarui');
    }

    public function destroy(Nilai $nilai)
    {
        $guru = Auth::user();
        $kelasIds = Kelas::where('guru_id', $guru->id)->pluck('id');
        $siswaIds = Siswa::whereIn('kelas_id', $kelasIds)->pluck('id')->toArray();
        
        if (!in_array($nilai->siswa_id, $siswaIds)) {
            return redirect()->route('guru.nilai.index')
                ->withErrors(['error' => 'Anda tidak berwenang menghapus nilai ini.']);
        }
        
        $nilai->delete();
        return redirect()->route('guru.nilai.index')
            ->with('success', 'Nilai berhasil dihapus');
    }
}