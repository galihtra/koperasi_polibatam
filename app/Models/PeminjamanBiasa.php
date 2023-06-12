<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBiasa extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_biasa'; // agar dibaca oleh laravel
    protected $fillable = ['user_id', 'biayaBunga_id', 'biayaAdmin_id', 'no_nik', 'alamat', 'nama', 'no_hp', 'dosen_staff', 'bagian', 'no_rek', 'email', 'alasan_pinjam', 'up_ket', 'ttd', 'amount_per_month', 'amount', 'status', 'duration', 'repayment_date', 'paid_months', 'remaining_amount', 'keterangan_tolak'];

    protected $casts = [
        'paid_months' => 'array',
    ];

    public function getProgress()
    {
        $statuses = ['Menunggu Pengawas', 'Menunggu Bendahara', 'Menunggu Ketua', 'Disetujui', 'Ditolak'];
        $currentStatusIndex = array_search($this->status, $statuses);
        $totalStatuses = count($statuses);
        return ($currentStatusIndex + 1) * (100 / $totalStatuses);
    }

    public function isStatusActiveOrPassed($status)
    {
        $statusOrder = ['Menunggu Pengawas', 'Menunggu Bendahara', 'Menunggu Ketua', 'Disetujui', 'Ditolak'];

        if (array_search($this->status, $statusOrder) >= array_search($status, $statusOrder)) {
            return true;
        }

        return false;
    }

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->paid_months = json_encode([]);
        });
    }
}
