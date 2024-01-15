<!-- resources/views/penyewa/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Penyewa</h1>

    <form action="{{ route('penyewa.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="form-group">
            <label for="telp">Telp</label>
            <input type="text" class="form-control" id="telp" name="telp" required>
        </div>
        <div class="form-group">
            <label for="no_sim">No. SIM</label>
            <input type="text" class="form-control" id="no_sim" name="no_sim" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
