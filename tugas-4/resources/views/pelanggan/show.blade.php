@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
<div class="container mt-4">
    <h1>Detail Pelanggan</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $pelanggan->nama }}</h5>
            <p class="card-text"><strong>Kode Pelanggan:</strong> {{ $pelanggan->kode_pelanggan }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $pelanggan->alamat ?? '-' }}</p>
            <p class="card-text"><strong>No. HP:</strong> {{ $pelanggan->no_hp }}</p>

            <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
