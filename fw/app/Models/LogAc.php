<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LogAc extends Model
{
    use HasFactory;

    protected $guards = [];
    protected $fillable=['activity','date'];
}
