<!-- resources/views/pesankendaraan/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Pesanan Kendaraan</h1>
    <a href="{{ route('pesankendaraan.create') }}" class="btn btn-primary">Tambah Pesanan Kendaraan</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Kendaraan</th>
                <th>Penyewa</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Lama Penggunaan</th>
                <th>Harga Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanKendaraans as $key => $pesankendaraan)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $pesankendaraan->kendaraan->merk }} - {{ $pesankendaraan->kendaraan->model }}</td>
                    <td>{{ $pesankendaraan->penyewa->nama }}</td>
                    <td>{{ $pesankendaraan->tanggal_sewa }}</td>
                    <td>{{ $pesankendaraan->tanggal_kembali }}</td>
                    <td>{{ $pesankendaraan->lama_penggunaan }} hari</td>
                    <td>{{ "Rp. ".number_format($pesankendaraan->total_biaya,0,'.','.') }}</td>
                    <td>
                        <a href="{{ route('pesankendaraan.edit', $pesankendaraan->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pesankendaraan.destroy', $pesankendaraan->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pesanKendaraans->links() }}
    
@endsection
