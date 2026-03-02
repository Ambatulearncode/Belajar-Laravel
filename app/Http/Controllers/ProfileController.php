<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $nama = "Budi Sikimak";
        $email = "budisikimak@gmail.com";
        $hobi = ["Mokel", "Mabok", "Bermain Wanita"];

        return view('profile', [
            'nama' => $nama,
            'email' => $email,
            'hobi' => $hobi
        ]);
    }

    public function show($id)
    {
        return "Menampilkan profile user dengan ID: " . $id;
    }
}
