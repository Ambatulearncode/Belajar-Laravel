<?php

namespace App\Http\Controllers;

use App\Models\Karyawan; //! Panggil model Karyawan
use Illuminate\Http\Request; //! Panggil class Request untuk menangkap input
use Illuminate\Http\RedirectResponse; //! Untuk type hinting Redirect
use Illuminate\View\View; //! untuk type hinting View

class KaryawanController extends Controller
{

    // * Method untuk menampilkan semua data karyawan
    public function index(): View
    {
        // ? Ambil semua data karyawan
        $karyawan = Karyawan::all();

        // ? Kirim variable $karyawan ke view
        return view('karyawan.index', compact('karyawan'));
    }


    // * Method unutk menampilkan FORM TAMBAH data
    public function create(): View
    {
        return view('karyawan.create');
    }

    // * Method untuk MENYIMPAN DATA baru dari form
    public function store(Request $request): RedirectResponse
    {
        // ? Validasi
        $request->validate([
            'nama' => 'required|min:3|max:100',
            'email' => 'required|email|unique:karyawans,email',
            'jabatan' => 'required|min:3',
            'umur' => 'required|numeric|min:17'
        ]);

        // ? Simpen data baru
        Karyawan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'umur' => $request->umur
        ]);

        return redirect()->to('/karyawan')
            ->with('success', 'Data berhasil disimpan');
    }

    public function show(int $id): View
    {
        // ? Cari karyawan by ID
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            abort(404, "Data karyawan tidak ditemukan");
        }

        return view('karyawan.show', compact('karyawan'));
    }
}
