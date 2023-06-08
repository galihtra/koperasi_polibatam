<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanUrgent extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_urgent'; // agar dibaca oleh laravel
    protected $fillable = ['user_id', 'no_nik', 'alamat', 'nama', 'no_hp', 'dosen_staff', 'bagian', 'keterangan_tolak', 'no_rek', 'email', 'alasan_pinjam', 'up_ket', 'ttd', 'jenis_pinjaman', 'amount_per_month', 'amount', 'status', 'status_pinjaman', 'duration', 'repayment_date', 'paid_months', 'remaining_amount'];

    protected $casts = [
        'paid_months' => 'array',
    ];

    public function getProgress()
    {
        $statuses = ['Menunggu Bendahara', 'Menunggu Ketua', 'Disetujui', 'Ditolak'];
        $currentStatusIndex = array_search($this->status, $statuses);
        $totalStatuses = count($statuses);
        return ($currentStatusIndex + 1) * (100 / $totalStatuses);
    }

    public function isStatusActiveOrPassed($status)
    {
        $statusOrder = ['Menunggu Bendahara', 'Menunggu Ketua', 'Disetujui', 'Ditolak'];

        if (array_search($this->status, $statusOrder) >= array_search($status, $statusOrder)) {
            return true;
        }

        return false;
    }



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