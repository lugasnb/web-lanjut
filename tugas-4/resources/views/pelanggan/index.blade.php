@extends('layouts.app')

@section('title', 'Daftar Pelanggan')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Pelanggan</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pelanggan</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggans as $key => $pelanggan)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $pelanggan->kode_pelanggan }}</td>
                <td>{{ $pelanggan->nama }}</td>
                <td>{{ $pelanggan->alamat ?? '-' }}</td>
                <td>{{ $pelanggan->no_hp }}</td>
                <td>
                    <a href="{{ route('pelanggan.show', $pelanggan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
