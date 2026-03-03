<?php

namespace App\Http\Controllers;

use App\Models\Karyawan; //! Panggil model Karyawan
use App\Models\Departemen; //! Panggil model departemen
use App\Http\Requests\KaryawanRequest;
use Illuminate\Http\Request; //! Panggil class Request untuk menangkap input
use Illuminate\Http\RedirectResponse; //! Untuk type hinting Redirect
use Illuminate\View\View; //! untuk type hinting View
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{

    // * Method untuk menampilkan semua data karyawan
    public function index(Request $request): View
    {
        // ? Search
        $search = $request->input('search');

        $karyawan = Karyawan::with('departemen')
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('jabatan', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // ? Kirim variable $karyawan ke view
        return view('karyawan.index', compact('karyawan'));
    }


    // * Method untuk menampilkan FORM TAMBAH data

    public function create(): View
    {
        $departemens = Departemen::orderBy('nama_departemen')->get();
        return view('karyawan.create', compact('departemens'));
    }

    // * Method untuk MENYIMPAN DATA baru dari form
    public function store(KaryawanRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // ? Handle file upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto', $filename);
            $data['foto'] = $filename;
        }

        Karyawan::create($data);

        return redirect()
            ->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil disimpan!');
    }

    public function show(Karyawan $karyawan): View
    {
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit(Karyawan $karyawan): View
    {
        $departemens = Departemen::orderBy('nama_departemen')->get();
        return view('karyawan.edit', compact('karyawan', 'departemens'));
    }

    public function update(KaryawanRequest $request, Karyawan $karyawan)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            if ($karyawan->foto) {
                Storage::delete('public/foto' . $karyawan->foto);
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto', $filename);
            $data['foto'] = $filename;
        }

        $karyawan->update($data);

        return redirect()
            ->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil diupdate!');
    }
}
