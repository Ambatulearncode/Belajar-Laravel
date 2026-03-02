@extends('layouts.app')

@section('title', 'Daftar Karyawan')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <h1>Daftar Karyawan</h1>
        </div>
        <div class="col text-end">
            <a href="{{ url('/karyawan/create') }}" class="btn btn-primary">
                + Tambah Karyawan
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if(isset($karyawan) && count($karyawan) > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Umur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($karyawan as $k)
                        <tr>
                            <td>{{ $k->id }}</td>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->email }}</td>
                            <td>{{ $k->jabatan }}</td>
                            <td>{{ $k->umur }}</td>
                            <td>
                                <a href="{{ url('/karyawan/' . $k->id) }}" 
                                    class="btn btn-sm btn-info text-white">Detail</a>
                                <a href="{{ url('/karyawan/' . $k->id . '/edit') }}" 
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ url('/karyawan/' . $k->id) }}" 
                                        method="POST" 
                                        style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Yakin hapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">
                    Belum ada data karyawan. 
                    <a href="{{ url('/karyawan/create') }}" class="alert-link">Tambah sekarang</a>.
                </div>
            @endif
        </div>
    </div>
@endsection