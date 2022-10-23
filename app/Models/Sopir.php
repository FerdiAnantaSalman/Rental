<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sopir extends Model
{
    use HasFactory;

    public $table = "sopir";

    protected $fillable = [
        'id',
        'kd_sopir',
        'nm_sopir',
        'nohp',
        'gender',
        'alamat',
        'ket',
    ];
}
