@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
<div class="container mt-4">
    <h1>Tambah Pelanggan</h1>
    
    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode_pelanggan" class="form-label">Kode Pelanggan</label>
            <input type="text" class="form-control" id="kode_pelanggan" name="kode_pelanggan" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No. HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
