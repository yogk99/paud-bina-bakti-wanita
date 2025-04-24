<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sentra;
use Illuminate\Http\Request;

class SentraController extends Controller
{
    public function index()
    {
        $sentras = Sentra::all();
        return view('admin.sentra.index', compact('sentras'));
    }

    public function create()
    {
        return view('admin.sentra.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_sentra' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Sentra::create($validated);

        return redirect()->route('admin.sentra.index')
            ->with('success', 'Sentra berhasil ditambahkan');
    }

    public function edit(Sentra $sentra)
    {
        return view('admin.sentra.edit', compact('sentra'));
    }

    public function update(Request $request, Sentra $sentra)
    {
        $validated = $request->validate([
            'nama_sentra' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $sentra->update($validated);

        return redirect()->route('admin.sentra.index')
            ->with('success', 'Sentra berhasil diperbarui');
    }

    public function destroy(Sentra $sentra)
    {
        $sentra->delete();
        return redirect()->route('admin.sentra.index')
            ->with('success', 'Sentra berhasil dihapus');
    }
}
