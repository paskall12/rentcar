<!-- resources/views/penyewa/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Penyewa</h1>

    <form action="{{ route('penyewa.update', $penyewa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $penyewa->nama }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $penyewa->alamat }}" required>
        </div>
        <div class="form-group">
            <label for="telp">Telp</label>
            <input type="text" class="form-control" id="telp" name="telp" value="{{ $penyewa->telp }}" required>
        </div>
        <div class="form-group">
            <label for="no_sim">No. SIM</label>
            <input type="text" class="form-control" id="no_sim" name="no_sim" value="{{ $penyewa->no_sim }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
