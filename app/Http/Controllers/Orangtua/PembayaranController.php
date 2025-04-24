<?php

namespace App\Http\Controllers\Orangtua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function index()
    {
        $orangtua = Auth::user();
        $siswa = Siswa::where('user_id', $orangtua->id)->first();
        
        if (!$siswa) {
            return view('orangtua.pembayaran.index')->withErrors(['error' => 'Data siswa tidak ditemukan.']);
        }
        
        $pembayaran = Pembayaran::where('siswa_id', $siswa->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('orangtua.pembayaran.index', compact('siswa', 'pembayaran'));
    }

    public function create()
    {
        $orangtua = Auth::user();
        $siswa = Siswa::where('user_id', $orangtua->id)->first();
        
        if (!$siswa) {
            return redirect()->route('orangtua.dashboard')
                ->withErrors(['error' => 'Data siswa tidak ditemukan.']);
        }
        
        $jenisPembayaran = [
            'SPP Bulanan',
            'Uang Kegiatan',
            'Uang Seragam',
            'Uang Buku',
            'Lainnya'
        ];
        
        return view('orangtua.pembayaran.create', compact('siswa', 'jenisPembayaran'));
    }

    public function store(Request $request)
    {
        $orangtua = Auth::user();
        $siswa = Siswa::where('user_id', $orangtua->id)->first();
        
        if (!$siswa) {
            return redirect()->route('orangtua.dashboard')
                ->withErrors(['error' => 'Data siswa tidak ditemukan.']);
        }
        
        $validated = $request->validate([
            'jenis_pembayaran' => 'required|string',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_bayar' => 'required|date',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'nullable|string',
        ]);
        
        $buktiPath = $request->file('bukti_pembayaran')->store('pembayaran', 'public');
        
        Pembayaran::create([
            'siswa_id' => $siswa->id,
            'jenis_pembayaran' => $validated['jenis_pembayaran'],
            'jumlah' => $validated['jumlah'],
            'tanggal_bayar' => $validated['tanggal_bayar'],
            'bukti_pembayaran' => $buktiPath,
            'keterangan' => $validated['keterangan'],
            'status' => 'menunggu',
        ]);
        
        return redirect()->route('orangtua.pembayaran.index')
            ->with('success', 'Bukti pembayaran berhasil dikirim. Mohon tunggu konfirmasi dari admin.');
    }

    public function show(Pembayaran $pembayaran)
    {
        $orangtua = Auth::user();
        $siswa = Siswa::where('user_id', $orangtua->id)->first();
        
        if (!$siswa || $pembayaran->siswa_id !== $siswa->id) {
            return redirect()->route('orangtua.pembayaran.index')
                ->withErrors(['error' => 'Anda tidak berwenang melihat data pembayaran ini.']);
        }
        
        return view('orangtua.pembayaran.show', compact('pembayaran'));
    }
}