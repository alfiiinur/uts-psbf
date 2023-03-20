<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warga;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warga::create(
            [
                'nik' => 123456781,
                'nama' => 'Rizky',
                'alamat' => 'Jl. Raya Cibadak',
                'no_telp' => '08123456789',
            ]
        );
    }
}
