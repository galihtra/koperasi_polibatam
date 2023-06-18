<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CicilanPinjaman;
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
        $request->validate([
            'id_pinjamanKhusus' => 'required|exists:peminjaman_khusus,id',
            'tgl_bayar' => 'required|date',
        ]);

        $pinjaman = PeminjamanKhusus::find($request->id_pinjamanKhusus);

        $cicilan = new CicilanPinjaman();
        $cicilan->id_pinjamanKhusus = $request->id_pinjamanKhusus;
        $cicilan->tgl_bayar = $request->tgl_bayar;
        $cicilan->jumlah_bayar = $pinjaman->amount_per_month;
        $cicilan->status = 'Sudah Dibayar';
        $cicilan->save();

        $pinjaman->remaining_amount -= $pinjaman->amount_per_month;
        $pinjaman->total_paid_per_month += $pinjaman->amount_per_month;

        if ($pinjaman->remaining_amount <= 0) {
            $pinjaman->status_pinjaman = 'Sudah Lunas';
        }

        $pinjaman->save();

        $riwayatCicilan = CicilanPinjaman::where('id_pinjamanKhusus', $request->id_pinjamanKhusus)->get();

        return redirect()->back()->with('success', 'Cicilan pinjaman berhasil dicatat.')->with('riwayatCicilan', $riwayatCicilan);
    }


}