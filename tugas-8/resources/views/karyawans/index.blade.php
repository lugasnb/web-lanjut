@extends('layouts.master')

@section('title', 'Daftar Karyawan')

@section('content')
<div class="container-fluid px-4">
    <div class="card animate__animated animate__fadeIn shadow-sm border-0">
        <div class="card-header bg-gradient-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold">
                        <i class="fas fa-user-tie me-2"></i>Daftar Karyawan
                    </h5>
                </div>
                <a href="{{ route('karyawans.create') }}" class="btn btn-light btn-sm rounded-pill">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Baru
                </a>
            </div>
        </div>
        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive rounded-3 overflow-hidden">
                <table class="table table-hover align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th class="fw-semibold text-muted text-center">No</th>
                            <th class="fw-semibold text-muted text-center">Kode</th>
                            <th class="fw-semibold text-muted text-center">Nama Karyawan</th>
                            <th class="fw-semibold text-muted text-center">Jabatan</th>
                            <th class="fw-semibold text-muted text-center">Kontak</th>
                            <th class="fw-semibold text-muted text-center">Alamat</th>
                            <th class="fw-semibold text-muted text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($karyawans as $karyawan)
                        <tr class="border-bottom">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1">
                                    {{ $karyawan->kode_karyawan }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3">
                                        <div class="avatar bg-primary bg-opacity-10 text-primary rounded-circle">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $karyawan->nama_karyawan }}</h6>
                                        <small class="text-muted">{{ $karyawan->email ?? '-' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $karyawan->jabatan ?? '-' }}
                            </td>
                            <td>
                                <div>
                                    <span class="d-block"><i class="fas fa-phone-alt me-2 text-muted"></i> {{ $karyawan->no_telp ?? '-' }}</span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span class="d-block"><i class="fas fa-home-alt me-2 text-muted"></i> {{ $karyawan->alamat ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="text-left">
                                <div class="btn-group" role="group">
                                    
                                    <a href="{{ route('karyawans.show', $karyawan->id) }}" class="btn btn-sm btn-outline-info rounded-start">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('karyawans.edit', $karyawan->id) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-end" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    
                                    
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="fas fa-user-slash text-muted fa-3x mb-3"></i>
                                    <h6 class="fw-semibold text-muted">Belum ada data karyawan</h6>
                                    <a href="{{ route('karyawans.create') }}" class="btn btn-sm btn-primary mt-2 rounded-pill">
                                        <i class="fas fa-plus me-1"></i> Tambah Karyawan
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($karyawans->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted small">
                    Menampilkan <span class="fw-semibold">{{ $karyawans->firstItem() }}</span> sampai 
                    <span class="fw-semibold">{{ $karyawans->lastItem() }}</span> dari 
                    <span class="fw-semibold">{{ $karyawans->total() }}</span> karyawan
                </div>
                <div>
                    {{ $karyawans->links('pagination::bootstrap-5') }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* TIDAK ADA PERUBAHAN STYLE */
    .card {
        border-radius: 12px;
        overflow: hidden;
        border: none;
    }
    
    .card-header {
        border-bottom: none;
        padding: 1.25rem 1.5rem;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #0ea5e9, #6366f1);
    }
    
    .table th {
        padding: 1rem 1.5rem;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }
    
    .table td {
        padding: 1rem 1.5rem;
        vertical-align: middle;
    }
    
    .avatar {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .avatar-sm {
        width: 36px;
        height: 36px;
    }
    
    .btn-group .btn {
        border-radius: 0;
    }
    
    .btn-group .btn:first-child {
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }
    
    .btn-group .btn:last-child {
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
    
    .empty-state {
        padding: 3rem 0;
    }

    .table thead {
    background-color: #0ea5e9;
    }

    .table thead th {
        color: white !important;
        border-bottom: none;
    }

    .table thead th:hover {
        background-color: #0c8fd1;
    }
</style>
@endpush

@push('scripts')
<script>
    // Inisialisasi tooltip
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    })
</script>
@endpush