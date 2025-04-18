@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
<div class="container mt-4">
    <h1>Edit Pelanggan</h1>
    
    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode_pelanggan" class="form-label">Kode Pelanggan</label>
            <input type="text" class="form-control" id="kode_pelanggan" name="kode_pelanggan" value="{{ $pelanggan->kode_pelanggan }}" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelanggan->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pelanggan->alamat }}">
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No. HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $pelanggan->no_hp }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
