<?php

namespace App\Http\Controllers;

use App\Models\PengurusMasjid;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function index()
    {
        $pengurus = PengurusMasjid::all();
        return view('pengurus.index', compact('pengurus'));
    }

    public function create()
    {
        return view('pengurus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string',
            'jabatan' => 'required|string',
            'no_hp' => 'required|string',
            'alamat' => 'nullable|string'
        ]);
        PengurusMasjid::create($validated);
        return redirect()->route('pengurus.index')->with('success', 'PENGURUS TERDAFTAR!');
    }

    public function edit($id)
    {
        $pengurus = PengurusMasjid::findOrFail($id);
        return view('pengurus.edit', compact('pengurus'));
    }

    public function update(Request $request, $id)
    {
        $pengurus = PengurusMasjid::findOrFail($id);
        $pengurus->update($request->all());
        return redirect()->route('pengurus.index')->with('success', 'DATA PENGURUS DIUBAH!');
    }

    public function destroy($id)
    {
        PengurusMasjid::findOrFail($id)->delete();
        return redirect()->route('pengurus.index')->with('success', 'DATA PENGURUS DIHAPUS!');
    }
}
