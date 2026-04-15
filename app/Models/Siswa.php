<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    public function kas()
    {
        return $this->hasMany(Kas::class, 'id_siswa', 'id_siswa');
    }
}