<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penyewa;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Models\Pesankendaraan;

class PesankendaraanController extends Controller
{
    public function index()
    {
        $pesanKendaraans = Pesankendaraan::paginate(10);
        return view('pesankendaraan.index', compact('pesanKendaraans'));
    }

    public function create()
    {
        $kendaraans = Kendaraan::all();
        $penyewas = Penyewa::all();
        return view('pesankendaraan.create', compact('kendaraans', 'penyewas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required',
            'penyewa_id' => 'required',
            'tanggal_sewa' => 'required', // Mengganti dari tanggal_pinjam
            'tanggal_kembali' => 'required',
            // tambahkan validasi sesuai kebutuhan
        ]);

        $kendaraan = Kendaraan::findOrFail($request->kendaraan_id);
        $hargaKendaraan = $kendaraan->harga;

        $tanggalSewa = Carbon::parse($request->tanggal_sewa); // Mengganti dari tanggal_pinjam
        $tanggalKembali = Carbon::parse($request->tanggal_kembali);
        $selisihHari = $tanggalKembali->diffInDays($tanggalSewa);

        // Hitung total biaya
        $totalBiaya = $selisihHari * $hargaKendaraan;

        // Tambahkan field total_biaya ke dalam request
        $request->merge(['total_biaya' => $totalBiaya, 'lama_penggunaan' => $selisihHari]);

        // Simpan pesanan kendaraan
        Pesankendaraan::create($request->all());

        return redirect()->route('pesankendaraan.index')->with('success', 'Pesanan kendaraan berhasil ditambahkan.');
    }


    public function edit(Pesankendaraan $pesankendaraan)
    {
        $kendaraans = Kendaraan::all();
        $penyewas = Penyewa::all();
        return view('pesankendaraan.edit', compact('pesankendaraan', 'kendaraans', 'penyewas'));
    }

    public function update(Request $request, Pesankendaraan $pesankendaraan)
    {
        $request->validate([
            'kendaraan_id' => 'required',
            'penyewa_id' => 'required',
            'tanggal_sewa' => 'required', // Mengganti dari tanggal_pinjam
            'tanggal_kembali' => 'required',
            // tambahkan validasi sesuai kebutuhan
        ]);

        $kendaraan = Kendaraan::findOrFail($request->kendaraan_id);
        $hargaKendaraan = $kendaraan->harga;

        $tanggalSewa = Carbon::parse($request->tanggal_sewa); // Mengganti dari tanggal_pinjam
        $tanggalKembali = Carbon::parse($request->tanggal_kembali);
        $selisihHari = $tanggalKembali->diffInDays($tanggalSewa);

        // Hitung total biaya
        $totalBiaya = $selisihHari * $hargaKendaraan;

        // Tambahkan field total_biaya ke dalam request
        $request->merge(['total_biaya' => $totalBiaya, 'lama_penggunaan' => $selisihHari]);

        // Update pesanan kendaraan
        $pesankendaraan->update($request->all());

        return redirect()->route('pesankendaraan.index')->with('success', 'Pesanan kendaraan berhasil diperbarui.');
    }

    public function destroy(Pesankendaraan $pesankendaraan)
    {
        $pesankendaraan->delete();

        return redirect()->route('pesankendaraan.index')->with('success', 'Pesanan kendaraan berhasil dihapus.');
    }
}
