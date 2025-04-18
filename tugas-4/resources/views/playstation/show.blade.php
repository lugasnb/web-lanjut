@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<div class="container mt-4">
    <h1>Detail Barang</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $barang->nama_barang }}</h5>
            <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($barang->harga, 0, ',', '.') }}</p>
            <p class="card-text"><strong>Stok:</strong> {{ $barang->stok }}</p>
            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection