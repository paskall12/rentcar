<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewa;

class PenyewaController extends Controller
{
    public function index()
    {
        $penyewas = Penyewa::all();
        return view('penyewa.index', compact('penyewas'));
    }

    public function create()
    {
        return view('penyewa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'no_sim' => 'required|unique:penyewa',
        ]);

        Penyewa::create($request->all());

        return redirect()->route('penyewa.index')->with('success', 'Penyewa berhasil ditambahkan.');
    }

    public function edit(Penyewa $penyewa)
    {
        return view('penyewa.edit', compact('penyewa'));
    }

    public function update(Request $request, Penyewa $penyewa)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'no_sim' => 'required|unique:penyewa,no_sim,' . $penyewa->id,
        ]);

        $penyewa->update($request->all());

        return redirect()->route('penyewa.index')->with('success', 'Penyewa berhasil diperbarui.');
    }

    public function destroy(Penyewa $penyewa)
    {
        $penyewa->delete();

        return redirect()->route('penyewa.index')->with('success', 'Penyewa berhasil dihapus.');
    }
}
