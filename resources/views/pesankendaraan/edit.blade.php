<!-- resources/views/pesankendaraan/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Pesanan Kendaraan</h1>

    <form action="{{ route('pesankendaraan.update', $pesankendaraan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kendaraan_id">Kendaraan</label>
            <select class="form-control" id="kendaraan_id" name="kendaraan_id" required>
                @foreach ($kendaraans as $kendaraan)
                    <option value="{{ $kendaraan->id }}" {{ $pesankendaraan->kendaraan_id == $kendaraan->id ? 'selected' : '' }}>{{ $kendaraan->merk }} - {{ $kendaraan->model }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="penyewa_id">Penyewa</label>
            <select class="form-control" id="penyewa_id" name="penyewa_id" required>
                @foreach ($penyewas as $penyewa)
                    <option value="{{ $penyewa->id }}" {{ $pesankendaraan->penyewa_id == $penyewa->id ? 'selected' : '' }}>{{ $penyewa->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_sewa">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tanggal_sewa" name="tanggal_sewa" value="{{ $pesankendaraan->tanggal_sewa }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ $pesankendaraan->tanggal_kembali }}" required>
        </div>
        <!-- tambahkan elemen formulir sesuai kebutuhan -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
