<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LogAc;

class LogAcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LogAc::create
        (
            [
                'activity' => 'Login',
                'date' => '2021-01-01',
            ]
        );
    }
}
