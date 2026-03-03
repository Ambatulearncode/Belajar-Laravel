<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departemen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_departemen',
        'kode_departemen',
        'deskripsi'
    ];

    // ? Relasi One to Many: Satu departemen punya banyak karyawan
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
