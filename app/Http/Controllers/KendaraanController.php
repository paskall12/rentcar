<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'merk' => 'required',
            'model' => 'required',
            'nomor_plat' => 'required|unique:kendaraan',
            'harga' => 'required|numeric',
            'status' => 'required',
        ]);

        // Simpan data ke database
        Kendaraan::create($request->all());

        return redirect()->route('kendaraan.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'merk' => 'required',
            'model' => 'required',
            'nomor_plat' => 'required|unique:kendaraan,nomor_plat,' . $kendaraan->id,
            'harga' => 'required|numeric',
            'status' => 'required',
        ]);

        // Perbarui data di database
        $kendaraan->update($request->all());

        return redirect()->route('kendaraan.index')->with('success', 'Kendaraan berhasil diperbarui.');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        // Hapus data dari database
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')->with('success', 'Kendaraan berhasil dihapus.');
    }
}
