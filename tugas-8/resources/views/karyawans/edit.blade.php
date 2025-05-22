@extends('layouts.master')

@section('title', 'Edit Karyawan')

@section('content')
<div class="container-fluid px-4">
    <div class="card animate__animated animate__fadeIn shadow-sm border-0">
        <div class="card-header bg-gradient-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold">
                    <i class="fas fa-user-edit me-2"></i>Edit Karyawan - {{ $karyawan->nama_karyawan }}
                </h5>
            </div>
        </div>
        
        <div class="card-body p-4">
            <form action="{{ route('karyawans.update', $karyawan->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_karyawan" class="form-label fw-semibold text-muted">Kode Karyawan</label>
                            <input type="text" class="form-control rounded-lg bg-light" id="kode_karyawan" name="kode_karyawan" 
                                   value="{{ old('kode_karyawan', $karyawan->kode_karyawan) }}" readonly>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_karyawan" class="form-label fw-semibold text-muted">Nama Karyawan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-lg" id="nama_karyawan" name="nama_karyawan" 
                                   value="{{ old('nama_karyawan', $karyawan->nama_karyawan) }}" required>
                            @error('nama_karyawan')
                                <div class="text-danger small mt-1">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jabatan" class="form-label fw-semibold text-muted">Jabatan</label>
                            <input type="text" class="form-control rounded-lg" id="jabatan" name="jabatan" 
                                   value="{{ old('jabatan', $karyawan->jabatan) }}">
                            @error('jabatan')
                                <div class="text-danger small mt-1">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_masuk" class="form-label fw-semibold text-muted">Tanggal Masuk</label>
                            <input type="date" class="form-control rounded-lg" id="tanggal_masuk" name="tanggal_masuk" 
                                value="{{ old('tanggal_masuk', $karyawan->tanggal_masuk ? \Carbon\Carbon::parse($karyawan->tanggal_masuk)->format('Y-m-d') : '') }}">
                            @error('tanggal_masuk')
                                <div class="text-danger small mt-1">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-label fw-semibold text-muted">Email</label>
                            <input type="email" class="form-control rounded-lg" id="email" name="email" 
                                   value="{{ old('email', $karyawan->email) }}">
                            @error('email')
                                <div class="text-danger small mt-1">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_telp" class="form-label fw-semibold text-muted">No. Telepon</label>
                            <input type="text" class="form-control rounded-lg" id="no_telp" name="no_telp" 
                                   value="{{ old('no_telp', $karyawan->no_telp) }}">
                            @error('no_telp')
                                <div class="text-danger small mt-1">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="alamat" class="form-label fw-semibold text-muted">Alamat</label>
                            <textarea class="form-control rounded-lg" id="alamat" name="alamat" rows="3">{{ old('alamat', $karyawan->alamat) }}</textarea>
                            @error('alamat')
                                <div class="text-danger small mt-1">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ route('karyawans.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
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
    
    .form-control {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #0ea5e9;
        box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.15);
    }
    
    .form-control[readonly] {
        background-color: #f8fafc;
    }
    
    .rounded-lg {
        border-radius: 8px;
    }
    
    .btn {
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background-color: #0ea5e9;
        border-color: #0ea5e9;
    }
    
    .btn-primary:hover {
        background-color: #0c8fd1;
        border-color: #0c8fd1;
        transform: translateY(-2px);
    }
    
    .btn-outline-secondary:hover {
        transform: translateY(-2px);
    }
    
    .form-label {
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
    }
</style>
@endpush