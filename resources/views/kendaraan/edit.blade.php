<!-- resources/views/kendaraan/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Kendaraan</h1>

    <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" class="form-control" id="merk" name="merk" value="{{ $kendaraan->merk }}" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ $kendaraan->model }}" required>
        </div>
        <div class="form-group">
            <label for="nomor_plat">Nomor Plat</label>
            <input type="text" class="form-control" id="nomor_plat" name="nomor_plat" value="{{ $kendaraan->nomor_plat }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" value="{{ $kendaraan->harga }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $kendaraan->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
