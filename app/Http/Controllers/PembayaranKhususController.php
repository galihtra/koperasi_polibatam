<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanKhusus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PembayaranKhususController extends Controller
{
    public function index(Request $request)
    {
        // if (Gate::any(['admin', 'bendahara'])) {
            $query = PeminjamanKhusus::query();

            // Filter berdasarkan status pinjaman
            if ($request->has('status_pinjaman') && $request->status_pinjaman !== '' && $request->status_pinjaman !== null) {
                $query->where('status_pinjaman', $request->status_pinjaman);
            }

            // Filter berdasarkan nama peminjam
            if ($request->has('nama') && $request->nama !== '') {
                $query->join('users', 'peminjaman_urgent.user_id', '=', 'users.id')->where('users.name', 'like', '%' . $request->nama . '%');
            }

            // Filter data yang sudah disetujui
            $query->where('status', 'Disetujui');

            // Urutkan berdasarkan status pinjaman dan sisa pinjaman
            $loans = $query->orderBy('status_pinjaman', 'asc')
                ->orderBy('remaining_amount', 'desc')
                ->paginate(5);

            $title = 'Daftar Cicilan Pinjaman Konsumtif Khusus';
            return view('pembayaran.khusus.index', compact('loans', 'title'));
        // }
    }

    public function MutasiUser(Request $request)
    {
        $userId = auth()->id();

        $query = PeminjamanKhusus::query()->where('user_id', $userId);

        // Filter berdasarkan status pinjaman
        if ($request->has('status_pinjaman') && $request->status_pinjaman !== '' && $request->status_pinjaman !== null) {
            $query->where('status_pinjaman', $request->status_pinjaman);
        }

        // Filter data yang sudah disetujui
        $query->where('status', 'Disetujui');

        // Urutkan berdasarkan status pinjaman dan sisa pinjaman
        $loans = $query->orderBy('status_pinjaman', 'asc')
            ->orderBy('remaining_amount', 'desc')
            ->paginate(5);

        $title = 'Daftar Mutasi Pinjaman Konsumtif Khusus';
        return view('pembayaran.khusus.mutasi', compact('loans', 'title'));
        
    }

    public function create($id)
    {
            $loan = PeminjamanKhusus::find($id);
            $months = [];
            $title = 'Pembayaran Pinjaman';
            return view('pembayaran.khusus.create', compact('loan', 'months', 'title'));
        
    }

    public function store(Request $request)
    {
        // if (Gate::any(['admin', 'bendahara'])) {
            $loan = PeminjamanKhusus::find($request->peminjaman_id);
            $paidMonths = json_decode($loan->paid_months, true) ?? [];
            $totalPaidAmount = $loan->total_paid_per_month ?? 0;
            $paymentDates = json_decode($loan->payment_dates, true) ?? []; // Perbaikan disini

            foreach ($request->months as $month) {
                if (!in_array($month, $paidMonths)) {
                    $paidMonths[] = $month;
                    $totalPaidAmount += $loan->amount_per_month;

                    // Tambahkan tanggal pembayaran
                    $paymentDates[$month] = \Carbon\Carbon::now()->format('d F Y');
                }
            }

            ksort($paymentDates); // Urutkan tanggal pembayaran berdasarkan bulan

            $loan->paid_months = json_encode($paidMonths);
            $loan->total_paid_per_month = $totalPaidAmount;
            $loan->remaining_amount = $loan->amount - $totalPaidAmount;
            $loan->payment_dates = json_encode($paymentDates); // Perbaikan disini
            $loan->save();

            // Update status to "Sudah Lunas" if remaining amount is 0
            if ($loan->remaining_amount == 0) {
                $loan->status_pinjaman = 'Sudah Lunas';
                $loan->save();
            }

            $namaPeminjam = $loan->user->name;
            $pesan = "Pembayaran atas nama $namaPeminjam telah berhasil.";

            return redirect()->route('pembayaran.khusus.index')->with('success', $pesan);
        // }
    }


}