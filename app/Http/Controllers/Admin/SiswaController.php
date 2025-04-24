<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with(['user', 'kelas'])->get();
        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $orangtua = User::where('role', 'orangtua')->get();
        $kelas = Kelas::all();
        return view('admin.siswa.create', compact('orangtua', 'kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nama_orangtua' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'kelas_id' => 'nullable|exists:kelas,id',
        ]);

        Siswa::create($validated);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit(Siswa $siswa)
    {
        $orangtua = User::where('role', 'orangtua')->get();
        $kelas = Kelas::all();
        return view('admin.siswa.edit', compact('siswa', 'orangtua', 'kelas'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nama_orangtua' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'kelas_id' => 'nullable|exists:kelas,id',
        ]);

        $siswa->update($validated);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}