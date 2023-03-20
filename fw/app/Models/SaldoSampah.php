<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoSampah extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nik',
        'nama',
        'alamat',
        'no_telp',
        'jenis_sampah',
        'berat_sampah',
        'harga_sampah',
        'tanggal',
    ];

        protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
