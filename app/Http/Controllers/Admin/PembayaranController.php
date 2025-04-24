<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('siswa')->get();
        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    public function show(Pembayaran $pembayaran)
    {
        return view('admin.pembayaran.show', compact('pembayaran'));
    }

    public function updateStatus(Request $request, Pembayaran $pembayaran)
    {
        $validated = $request->validate([
            'status' => 'required|in:menunggu,dikonfirmasi,ditolak',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran->update($validated);

        return redirect()->route('admin.pembayaran.index')
            ->with('success', 'Status pembayaran berhasil diperbarui');
    }
}