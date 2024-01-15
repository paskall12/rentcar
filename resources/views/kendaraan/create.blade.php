<!-- resources/views/kendaraan/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Kendaraan</h1>

    <form action="{{ route('kendaraan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" class="form-control" id="merk" name="merk" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" name="model" required>
        </div>
        <div class="form-group">
            <label for="nomor_plat">Nomor Plat</label>
            <input type="text" class="form-control" id="nomor_plat" name="nomor_plat" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
