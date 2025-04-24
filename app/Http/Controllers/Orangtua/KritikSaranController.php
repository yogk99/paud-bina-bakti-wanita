<?php

namespace App\Http\Controllers\Orangtua;

use App\Http\Controllers\Controller;
use App\Models\KritikSaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KritikSaranController extends Controller
{
    public function index()
    {
        $orangtua = Auth::user();
        $kritikSaran = KritikSaran::where('user_id', $orangtua->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('orangtua.kritik-saran.index', compact('kritikSaran'));
    }

    public function create()
    {
        return view('orangtua.kritik-saran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);
        
        KritikSaran::create([
            'user_id' => Auth::id(),
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'status' => 'belum_dibaca',
        ]);
        
        return redirect()->route('orangtua.kritik-saran.index')
            ->with('success', 'Kritik dan saran berhasil dikirim.');
    }

    public function show(KritikSaran $kritikSaran)
    {
        if ($kritikSaran->user_id !== Auth::id()) {
            return redirect()->route('orangtua.kritik-saran.index')
                ->withErrors(['error' => 'Anda tidak berwenang melihat kritik dan saran ini.']);
        }
        
        return view('orangtua.kritik-saran.show', compact('kritikSaran'));
    }
}