<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersentaseAdmin extends Model
{
    use HasFactory;

    
    protected $table = 'persentase_admin'; // agar dibaca oleh laravel
    protected $fillable = ['nama', 'nilai'];

    public function peminjamanBiasa()
    {
        return $this->hasMany(PeminjamanBiasa::class);
    }

    public function peminjamanKhusus()
    {
        return $this->hasMany(PeminjamanKhusus::class);
    }
}
