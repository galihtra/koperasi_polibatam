<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBiasa extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_biasa'; // agar dibaca oleh laravel
    protected $fillable = ['user_id', 'biayaBunga_id', 'biayaAdmin_id', 'no_nik', 'alamat', 'nama', 'no_hp', 'dosen_staff', 'bagian', 'no_rek', 'email', 'alasan_pinjam', 'up_ket', 'ttd', 'amount_per_month', 'amount', 'status', 'duration', 'repayment_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bunga()
    {
        return $this->belongsTo(PersentaseBunga::class);
    }

    public function administrasi()
    {
        return $this->belongsTo(PersentaseAdmin::class);
    }
}
