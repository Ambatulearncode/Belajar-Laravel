@extends('layouts.app')

@section('title', 'Daftar Karyawan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>
        <i class="fas fa-users text-primary me-2"></i>
        Daftar Karyawan
    </h1>
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle me-1"></i> Tambah Karyawan
    </a>
</div>

{{-- Search Form --}}
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form action="{{ route('karyawan.index') }}" method="GET" class="row g-3">
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="fas fa-search text-primary"></i>
                    </span>
                    <input type="text" 
                           class="form-control" 
                           name="search" 
                           value="{{ $search ?? '' }}"
                           placeholder="Cari berdasarkan nama, email, atau jabatan...">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search me-1"></i> Cari
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Table Data --}}
<div class="card shadow-sm">
    <div class="card-body">
        @if($karyawan->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>Umur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($karyawan as $index => $k)
                        <tr>
                            <td>{{ $karyawan->firstItem() + $index }}</td>
                            <td>
                                @if($k->foto)
                                    <img src="{{ Storage::url('foto/' . $k->foto) }}" 
                                         alt="foto" 
                                         class="rounded-circle"
                                         width="40" height="40"
                                         style="object-fit: cover;">
                                @else
                                    <div class="bg-secondary bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center"
                                         style="width: 40px; height: 40px;">
                                        <i class="fas fa-user text-secondary"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->email }}</td>
                            <td>{{ $k->jabatan }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $k->departemen->nama_departemen ?? 'Tidak Ada' }}
                                </span>
                            </td>
                            <td>{{ $k->umur }} tahun</td>
                            <td>
                                <a href="{{ route('karyawan.show', $k) }}" 
                                   class="btn btn-sm btn-info text-white"
                                   title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('karyawan.edit', $k) }}" 
                                   class="btn btn-sm btn-warning"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('karyawan.destroy', $k) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    Menampilkan {{ $karyawan->firstItem() }} - {{ $karyawan->lastItem() }} 
                    dari {{ $karyawan->total() }} data
                </div>
                <div>
                    {{ $karyawan->withQueryString()->links() }}
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-users-slash fa-4x text-secondary mb-3"></i>
                <h4>Tidak Ada Data Karyawan</h4>
                <p class="text-secondary">Silakan tambah karyawan baru.</p>
                <a href="{{ route('karyawan.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Karyawan
                </a>
            </div>
        @endif
    </div>
</div>
@endsection