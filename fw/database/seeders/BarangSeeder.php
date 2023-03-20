<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create(
            [
                'nama_sampah' => 'Kertas',
                'satuan' => 'Kg',
                'harga' => '1000',
                'deskripsi' => 'Kertas yang sudah tidak terpakai'

            ]
        );
    }
}
