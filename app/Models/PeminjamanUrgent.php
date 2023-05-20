<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanUrgent extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_urgent'; // agar dibaca oleh laravel
    protected $fillable = ['user_id', 'no_nik', 'alamat', 'nama', 'no_hp', 'dosen_staff', 'bagian', 'no_rek', 'email', 'alasan_pinjam', 'up_ket', 'ttd', 'jenis_pinjaman', 'amount_per_month', 'amount', 'status', 'duration', 'repayment_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}