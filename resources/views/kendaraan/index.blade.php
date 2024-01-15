<!-- resources/views/kendaraan/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Kendaraan</h1>
    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">Tambah Kendaraan</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Merk</th>
                <th>Model</th>
                <th>Nomor Plat</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kendaraans as $key =>  $kendaraan)
                <tr>
                    <td>{{ $key +1 }}</td>
                    <td>{{ $kendaraan->merk }}</td>
                    <td>{{ $kendaraan->model }}</td>
                    <td>{{ $kendaraan->nomor_plat }}</td>
                    <td>{{ $kendaraan->harga }}</td>
                    <td>{{ $kendaraan->status }}</td>
                    <td>
                        <a href="{{ route('kendaraan.edit', $kendaraan->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
