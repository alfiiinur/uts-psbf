<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SaldoSampah;



class SaldoSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SaldoSampah::create(
            [
                'nik' => 123456789,
                'nama' => 'Warga',
                'alamat' => 'Jl. Jalan',
                'no_telp' => '08123456789',
                'jenis_sampah' => 'Plastik',
                'berat_sampah' => '10',
                'harga_sampah' => '10000',
                'tanggal' => 2021-05-01,

            ]
        );
    }
}
