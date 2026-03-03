<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Departemen;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departemens = [
            [
                'nama_departemen' => 'Teknologi Informasi',
                'kode_departemen' => 'TI',
                'deskripsi' => 'Bidang IT dan Pengembangan Sistem'
            ],
            [
                'nama_departemen' => 'Sumber Daya Manusia',
                'kode_departemen' => 'SDM',
                'deskripsi' => 'Bidang HRD dan Pengembangan Karyawan'
            ],
            [
                'nama_departemen' => 'Keuangan',
                'kode_departemen' => 'KEU',
                'deskripsi' => 'Bidang Keuangan dan Akuntansi'
            ],
            [
                'nama_departemen' => 'Pemasaran',
                'kode_departemen' => 'MKT',
                'deskripsi' => 'Bidang Marketing dan Promosi'
            ],
            [
                'nama_departemen' => 'Operasional',
                'kode_departemen' => 'OPS',
                'deskripsi' => 'Bidang Operasional dan Logistik'
            ],
        ];

        foreach ($departemens as $dept) {
            Departemen::create($dept);
        }
    }
}
