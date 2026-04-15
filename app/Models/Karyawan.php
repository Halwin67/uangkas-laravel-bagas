<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    // Hanya kolom nama dan posisi yang diizinkan untuk diisi
    protected $fillable = ['nama', 'posisi'];
}
