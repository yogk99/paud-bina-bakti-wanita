<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KritikSaran;
use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    public function index()
    {
        $kritikSarans = KritikSaran::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.kritik-saran.index', compact('kritikSarans'));
    }

    public function show(KritikSaran $kritikSaran)
    {
        if ($kritikSaran->status === 'belum_dibaca') {
            $kritikSaran->update(['status' => 'dibaca']);
        }
        
        return view('admin.kritik-saran.show', compact('kritikSaran'));
    }

    public function destroy(KritikSaran $kritikSaran)
    {
        $kritikSaran->delete();
        return redirect()->route('admin.kritik-saran.index')
            ->with('success', 'Kritik dan saran berhasil dihapus');
    }
}