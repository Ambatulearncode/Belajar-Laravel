<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    // ? Tentukan kolom yang boleh diisi (Mass Assigment)
    protected $fillable = [
        'nama',
        'email',
        'jabatan',
        'umur'
    ];

    // ? Mengubah tipe data otomatis
    protected $casts = [
        'umur' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
