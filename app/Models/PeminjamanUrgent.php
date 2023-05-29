<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanUrgent extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_urgent'; // agar dibaca oleh laravel
    protected $fillable = ['user_id', 'no_nik', 'alamat', 'nama', 'no_hp', 'dosen_staff', 'bagian', 'no_rek', 'email', 'alasan_pinjam', 'up_ket', 'ttd', 'jenis_pinjaman', 'amount_per_month', 'amount', 'status', 'duration', 'repayment_date', 'paid_months', 'remaining_amount'];

    protected $casts = [
        'paid_months' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->paid_months = json_encode([]);
        });
    }
}