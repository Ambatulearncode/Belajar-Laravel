@extends('layouts.app')

@section('title', 'Edit Karyawan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2"></i>
                    Form Edit Karyawan
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('karyawan.update', $karyawan) }}" 
                      method="POST" 
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Pilih Departemen --}}
                    <div class="mb-3">
                        <label for="departemen_id" class="form-label">
                            Departemen <span class="text-danger">*</span>
                        </label>
                        <select name="departemen_id" 
                                id="departemen_id" 
                                class="form-select @error('departemen_id') is-invalid @enderror">
                            <option value="">-- Pilih Departemen --</option>
                            @foreach($departemens as $dept)
                                <option value="{{ $dept->id }}" 
                                    {{ old('departemen_id', $karyawan->departemen_id) == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->nama_departemen }} ({{ $dept->kode_departemen }})
                                </option>
                            @endforeach
                        </select>
                        @error('departemen_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">
                            Nama Lengkap <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('nama') is-invalid @enderror" 
                               id="nama" 
                               name="nama" 
                               value="{{ old('nama', $karyawan->nama) }}"
                               placeholder="Masukkan nama lengkap">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Email <span class="text-danger">*</span>
                        </label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', $karyawan->email) }}"
                               placeholder="contoh@email.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jabatan --}}
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">
                            Jabatan <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('jabatan') is-invalid @enderror" 
                               id="jabatan" 
                               name="jabatan" 
                               value="{{ old('jabatan', $karyawan->jabatan) }}"
                               placeholder="Contoh: Programmer, HRD, dll">
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Umur --}}
                    <div class="mb-3">
                        <label for="umur" class="form-label">
                            Umur <span class="text-danger">*</span>
                        </label>
                        <input type="number" 
                               class="form-control @error('umur') is-invalid @enderror" 
                               id="umur" 
                               name="umur" 
                               value="{{ old('umur', $karyawan->umur) }}"
                               placeholder="Masukkan umur"
                               min="17"
                               max="100">
                        @error('umur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Foto --}}
                    <div class="mb-3">
                        <label for="foto" class="form-label">
                            Foto Karyawan
                        </label>
                        
                        {{-- Tampilkan foto lama --}}
                        @if($karyawan->foto)
                            <div class="mb-2">
                                <img src="{{ Storage::url('foto/' . $karyawan->foto) }}" 
                                     alt="Foto Karyawan" 
                                     class="img-thumbnail"
                                     style="max-width: 150px;">
                            </div>
                        @endif
                        
                        <input type="file" 
                               class="form-control @error('foto') is-invalid @enderror" 
                               id="foto" 
                               name="foto"
                               accept="image/*">
                        <div class="form-text">Format: JPG, JPEG, PNG. Maks: 2MB</div>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Preview Foto Baru --}}
                    <div class="mb-3" id="previewContainer" style="display: none;">
                        <label class="form-label">Preview Foto Baru:</label>
                        <img id="preview" src="#" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save me-1"></i> Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('foto').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('previewContainer').style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            document.getElementById('previewContainer').style.display = 'none';
        }
    });
</script>
@endpush