<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Sentra;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
        {
            $guru = Auth::user();
            $kelasIds = Kelas::where('guru_id', $guru->id)->pluck('id');
            $jadwals = Jadwal::whereIn('kelas_id', $kelasIds)
              ->with(['kelas', 'sentra'])
              ->orderBy('hari')
              ->orderBy('jam_mulai')
              ->get();
        
            return view('guru.jadwal.index', compact('jadwals'));
        }
    
    public function create()
        {
            $guru = Auth::user();
            $kelas = Kelas::where('guru_id', $guru->id)->get();
            $sentra = Sentra::all();
            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            
            return view('guru.jadwal.create', compact('kelas', 'sentra', 'hari'));
        }
    
    public function store(Request $request)
        {
            $validated = $request->validate([
                'kelas_id' => 'required|exists:kelas,id',
                'sentra_id' => 'required|exists:sentra,id',
                'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
                'jam_mulai' => 'required|date_format:H:i',
                'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            ]);
    
            $guru = Auth::user();
            $kelas = Kelas::where('id', $validated['kelas_id'])
                ->where('guru_id', $guru->id)
                ->first();
                
            if (!$kelas) {
                return redirect()->back()->withErrors(['kelas_id' => 'Anda hanya dapat membuat jadwal untuk kelas yang Anda ampu.']);
            }
    
            Jadwal::create($validated);
    
            return redirect()->route('guru.jadwal.index')
                ->with('success', 'Jadwal berhasil ditambahkan');
        }
    
        public function edit(Jadwal $jadwal)
        {
            $guru = Auth::user();
            $kelas = Kelas::where('guru_id', $guru->id)->get();
            $sentra = Sentra::all();
            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            $kelasIds = $kelas->pluck('id')->toArray();
            if (!in_array($jadwal->kelas_id, $kelasIds)) {
                return redirect()->route('guru.jadwal.index')
                    ->withErrors(['error' => 'Anda tidak berwenang mengedit jadwal ini.']);
            }
            
            return view('guru.jadwal.edit', compact('jadwal', 'kelas', 'sentra', 'hari'));
        }
    
        public function update(Request $request, Jadwal $jadwal)
        {
            $validated = $request->validate([
                'kelas_id' => 'required|exists:kelas,id',
                'sentra_id' => 'required|exists:sentra,id',
                'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
                'jam_mulai' => 'required|date_format:H:i',
                'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            ]);
    
            $guru = Auth::user();
            $kelas = Kelas::where('id', $validated['kelas_id'])
                ->where('guru_id', $guru->id)
                ->first();
                
            if (!$kelas) {
                return redirect()->back()->withErrors(['kelas_id' => 'Anda hanya dapat membuat jadwal untuk kelas yang Anda ampu.']);
            }
    
            $jadwal->update($validated);
    
            return redirect()->route('guru.jadwal.index')
                ->with('success', 'Jadwal berhasil diperbarui');
        }
    
        public function destroy(Jadwal $jadwal)
        {
            $guru = Auth::user();
            $kelasIds = Kelas::where('guru_id', $guru->id)->pluck('id')->toArray();
            if (!in_array($jadwal->kelas_id, $kelasIds)) {
                return redirect()->route('guru.jadwal.index')
                    ->withErrors(['error' => 'Anda tidak berwenang menghapus jadwal ini.']);
            }
            
            $jadwal->delete();
            return redirect()->route('guru.jadwal.index')
                ->with('success', 'Jadwal berhasil dihapus');
        }
    }