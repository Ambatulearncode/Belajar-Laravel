@extends('layouts.app')

@section('title', 'Detail Karyawan')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Karyawan</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">ID</th>
                            <td>{{ $karyawan->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $karyawan->nama }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $karyawan->email }}</td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td>{{ $karyawan->jabatan }}</td>
                        </tr>
                        <tr>
                            <th>Umur</th>
                            <td>{{ $karyawan->umur }}</td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>{{ $karyawan->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Diupdate Pada</th>
                            <td>{{ $karyawan->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ url('/karyawan') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                        <a href="{{ url('/karyawan/' . $karyawan->id . '/edit') }}" 
                            class="btn btn-warning">
                            Edit
                        </a>
                        <form action="{{ url('/karyawan/' . $karyawan->id) }}" 
                                method="POST" 
                                style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-danger" 
                                    onclick="return confirm('Yakin hapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection