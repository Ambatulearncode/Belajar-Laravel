@extends('layouts.app')

@section('title', 'Tambah Karyawan')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah Karyawan Baru</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/karyawan') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" 
                                    class="form-control @error('nama') is-invalid @enderror" 
                                    id="nama" 
                                    name="nama" 
                                    value="{{ old('nama') }}" 
                                    required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    id="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" 
                                    class="form-control @error('jabatan') is-invalid @enderror" 
                                    id="jabatan" 
                                    name="jabatan" 
                                    value="{{ old('jabatan') }}" 
                                    required>
                            @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur</label>
                            <input type="number" 
                                    class="form-control @error('umur') is-invalid @enderror" 
                                    id="umur" 
                                    name="umur" 
                                    value="{{ old('umur') }}" 
                                    required>
                            @error('umur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ url('/karyawan') }}" class="btn btn-secondary me-md-2">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection