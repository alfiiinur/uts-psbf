<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SampahMenjement;

class SampahMenjementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SampahMenjement::create(
            [
                'nama_sampah' => 'Kertas',
                'satuan' => 'KG',
                'harga' => '1000',
                'deskripsi' => 'Kertas'
            ]
        );
    }
}
