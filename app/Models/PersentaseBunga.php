<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersentaseBunga extends Model
{
    use HasFactory;

    protected $table = 'persentase_bunga'; // agar dibaca oleh laravel
    protected $fillable = ['nama', 'nilai'];

    public function peminjamanBiasa()
    {
        return $this->hasMany(PeminjamanBiasa::class);
    }
}
