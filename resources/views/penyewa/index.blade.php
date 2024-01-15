<!-- resources/views/penyewa/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Penyewa</h1>
    <a href="{{ route('penyewa.create') }}" class="btn btn-primary">Tambah Penyewa</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>No. SIM</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penyewas as $key => $penyewa)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $penyewa->nama }}</td>
                    <td>{{ $penyewa->alamat }}</td>
                    <td>{{ $penyewa->telp }}</td>
                    <td>{{ $penyewa->no_sim }}</td>
                    <td>
                        <a href="{{ route('penyewa.edit', $penyewa->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('penyewa.destroy', $penyewa->id) }}" method="POST" style="display:inline">
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
