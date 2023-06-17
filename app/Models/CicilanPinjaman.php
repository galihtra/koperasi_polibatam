<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CicilanPinjaman extends Model
{
    use HasFactory;

    protected $table = 'cicilan_pinjaman'; // agar dibaca oleh laravel

    protected $guarded = ['id'];

    public function PinjamanUrgent()
    {
        return $this->belongsTo(PeminjamanUrgent::class);
    }

    public function PinjamanBiasa()
    {
        return $this->belongsTo(PeminjamanBiasa::class);
    }

    public function PinjamanKhusus()
    {
        return $this->belongsTo(PeminjamanKhusus::class);
    }

}
