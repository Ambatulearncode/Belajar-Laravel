<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    // ? Tentukan kolom yang boleh diisi (Mass Assigment)
    protected $fillable = [
        'departemen_id',
        'nama',
        'email',
        'jabatan',
        'umur',
        'foto'
    ];

    // ? Mengubah tipe data otomatis
    protected $casts = [
        'umur' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // ? Relasi Many to One (Inverse): karyawan milik satu departemen
    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    // ? Accessor: Format foto URL
    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/foto/' . $this->foto) : asset('images/default.png');
    }
}
