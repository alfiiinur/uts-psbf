<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SampahMenjement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sampah',
        'satuan',
        'harga',
        'deskripsi',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
