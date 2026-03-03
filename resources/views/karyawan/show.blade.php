@extends('layouts.app')

@section('title', 'Detail Karyawan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">
                    <i class="fas fa-user-circle me-2"></i>
                    Detail Karyawan
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- Foto Profile --}}
                    <div class="col-md-4 text-center mb-4">
                        @if($karyawan->foto)
                            <img src="{{ Storage::url('foto/' . $karyawan->foto) }}" 
                                 alt="Foto Karyawan" 
                                 class="img-fluid rounded-circle shadow"
                                 style="width: 200px; height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center mx-auto shadow"
                                 style="width: 200px; height: 200px;">
                                <i class="fas fa-user fa-5x text-secondary"></i>
                            </div>
                        @endif
                    </div>
                    
                    {{-- Detail Info --}}
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <th width="150">ID Karyawan</th>
                                <td>{{ $karyawan->id }}</td>
                            </tr>
                            <tr>
                                <th>Departemen</th>
                                <td>
                                    @if($karyawan->departemen)
                                        <span class="badge bg-primary">
                                            {{ $karyawan->departemen->nama_departemen }}
                                        </span>
                                        <small class="text-secondary">
                                            ({{ $karyawan->departemen->kode_departemen }})
                                        </small>
                                    @else
                                        <span class="badge bg-secondary">Belum Ada</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>{{ $karyawan->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                    <i class="fas fa-envelope me-1 text-secondary"></i>
                                    {{ $karyawan->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td>{{ $karyawan->jabatan }}</td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <td>{{ $karyawan->umur }} tahun</td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <td>
                                    <i class="fas fa-calendar me-1 text-secondary"></i>
                                    {{ $karyawan->created_at->format('d F Y H:i') }}
                                    <small class="text-secondary">
                                        ({{ $karyawan->created_at->diffForHumans() }})
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th>Diupdate Pada</th>
                                <td>
                                    <i class="fas fa-clock me-1 text-secondary"></i>
                                    {{ $karyawan->updated_at->format('d F Y H:i') }}
                                    <small class="text-secondary">
                                        ({{ $karyawan->updated_at->diffForHumans() }})
                                    </small>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <a href="{{ route('karyawan.edit', $karyawan) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                    <form action="{{ route('karyawan.destroy', $karyawan) }}" 
                            method="POST" 
                            class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection